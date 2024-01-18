<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Institute;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    public function invoicePayment(Request $request, Invoice $invoice, Institute $institute)
    {
        #

        dd('We are here');

        try {
            // Get the exchange rate
            $exchange_rate = ExchangeRate::getExchangeRate();
            $ghs_amount = $invoice->outstandingAmount * (($exchange_rate + 0.40) * 100);

            $reference = Paystack::genTranxRef();
            $orderID = $invoice->id;

            $data = array(
                "amount" => round($ghs_amount),
                "reference" =>  $reference,
                "email" => Auth::user()->email,
                "currency" => "GHS",
                "orderID" => $orderID,
                "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                "metadata" => [
                    "institute_id" => $institute->id,
                    "invoice_id" => $invoice->id,


                ]
            );

            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function redirectToGateway(PaymentRequest $request)
    {


        // If request has partPayment (Participant request for installment payment),
        // create a New Invoice and redirect to invoice.index.

        if ($request->paymentoption === "partPayment") {

            $institute = Institute::findOrFail($request->institute_id);
            $user = Auth::user();

            // Check if the user has a pending invoice for the particular institute
            $invoiceExists  = Invoice::where('participant_id', $user->id)
                ->where('institute_id', $institute->id)
                ->where('status', 'pending')
                ->exists();


            if ($invoiceExists) {
                // Get the existing invoice and pass it to the view
                $invoice  = Invoice::where('participant_id', $user->id)
                    ->where('institute_id', $institute->id)
                    ->where('status', 'pending')->first();

                return view('payment/installment-payment', [
                    'institute' => $institute,
                    'invoice' => $invoice
                ]);
            }


            if (!$invoiceExists) {
                // create new invoice
                $invoice = new Invoice;
                $invoice->participant_id = Auth::user()->id;
                $invoice->institute_id = $institute->id;
                $invoice->status = 'pending';
                $invoice->totalAmount = $institute->price;
                $invoice->outstandingAmount = $institute->price;
                $invoice->save();

                return view('payment/installment-payment', [
                    'institute' => $institute,
                    'invoice' => $invoice
                ]);
            }
        }
        if ($request->paymentoption === "fullPayment") {

            try {
                // Get the institute you are paying for.
                $institute = Institute::whereAcronym($request->institute)->first();
                $user = Auth::user();

                // Check if invoice exists for user regarding this institute
                $invoiceExists  = Invoice::where('participant_id', $user->id)
                    ->where('institute_id', $institute->id)
                    ->where('status', 'pending')
                    ->exists();

                if ($invoiceExists) {
                    // get the existing invoice
                    $invoice = Invoice::where('participant_id', $user->id)
                        ->where('institute_id', $institute->id)
                        ->where('status', 'pending')->first();
                } else {

                    $invoice = new Invoice;
                    $invoice->participant_id = Auth::user()->id;
                    $invoice->institute_id = $institute->id;
                    $invoice->status = 'pending';
                    $invoice->totalAmount = $institute->price;
                    $invoice->outstandingAmount = $institute->price;
                    $invoice->save();
                }




                // Get the exchange rate
                $exchange_rate = ExchangeRate::getExchangeRate();
                $ghs_amount = $invoice->outstandingAmount * (($exchange_rate + 0.40) * 100);

                $reference = Paystack::genTranxRef();
                $orderID = $invoice->id;

                $data = array(
                    "amount" => round($ghs_amount),
                    "reference" =>  $reference,
                    "email" => Auth::user()->email,
                    "currency" => "GHS",
                    "orderID" => $orderID,
                    "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                    "metadata" => [
                        "institute_id" => $institute->id,
                        "invoice_id" => $invoice->id,


                    ]
                );

                return Paystack::getAuthorizationUrl($data)->redirectNow();
            } catch (\Exception $e) {
                dd($e);
                return redirect()->back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
            }
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails && isset($paymentDetails['data']['metadata']['donation'])) {
            // Run logic for Donation payment
            // Redirect to institute frontpage URL
            $donation = Donation::create([
                'amount' => $paymentDetails['data']['amount'],
                'fees' => $paymentDetails['data']['fees'],
                'ip_address' => $paymentDetails['data']['ip_address'],
                'donor_email' => $paymentDetails['data']['customer']['email'],
                'donor_name' => $paymentDetails['data']['metadata']['name'],
                'user_id' => $paymentDetails['data']['metadata']['user_id'],
            ]);

            // Donation instance created. Redirect and thank you.
            app('flasher')->addSuccess('Thank you for your kind donation.', 'Success');
            return redirect()->route('home');
        }

        try {
            if ($paymentDetails['status'] == true) {
                // Get the institute and invoice
                $institute = Institute::findOrFail($paymentDetails['data']['metadata']['institute_id']);
                $invoice = Invoice::findOrFail($paymentDetails['data']['metadata']['invoice_id']);

                // Associate the user with the institute
                $institute->participants()->attach(Auth::user()->id, ['created_at' => now()]);

                // Create the transaction
                $transaction = Transaction::create([
                    'amount' => $paymentDetails['data']['amount'],
                    'description' => 'Payment for services rendered',
                    'fees' => $paymentDetails['data']['fees'],
                    'participant_id' => Auth::user()->id,
                    'reference' => $paymentDetails['data']['reference'],
                    'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
                    'transaction_date' => Carbon::parse($paymentDetails['data']['created_at'])->toDateTimeString(),
                    'currency' => $paymentDetails['data']['currency'],
                    'ipAddress' => $paymentDetails['data']['ip_address'],
                    'institute_id' => $institute->id,
                ]);

                // Update the invoice
                $invoice->status = 'paid';
                $invoice->transaction_id = $transaction->id;
                $invoice->institute_id = $institute->id;
                $invoice->totalAmount = $institute->price;
                $invoice->outstandingAmount = 0.0; // Full payment
                $invoice->save();

                // Sync the transaction with the invoice through the pivot table
                $invoice->transactions()->attach($transaction->id, ['participant_id' => Auth::user()->id, 'remarks' => null]);


                // Redirect to institute frontpage URL
                app('flasher')->addSuccess('Payment Complete. Enrollment Successful.', 'Success');
                return redirect()->route('institute.show', [$institute]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }


    private static function preventDuplicateInstituteTransaction($id)
    {
        $institute = Institute::find($id);

        if (!$institute) {
            app('flasher')->addError('Institute not found.', 'Error');
            return redirect()->back();
        }

        $user = Auth::user();

        if (!$user) {
            app('flasher')->addError('User not authenticated.', 'Error');
            return redirect()->back();
        }

        $transaction = Transaction::where('participant_id', $user->id)->where('institute_id', $id)->first();

        if ($transaction && $institute->created_at->year == $transaction->created_at->year) {
            app('flasher')->addWarning('You have already enrolled in this institute.', 'Already Enrolled');
            return redirect()->route('institute.show', $institute);
        }

        // Continue with the rest of your logic
    }
}
