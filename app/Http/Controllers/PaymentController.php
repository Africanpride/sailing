<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Donation;
use App\Models\Institute;
use App\Models\Transaction;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{



    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails && isset($paymentDetails['data']['metadata']['donation'])) {
            // Run logic for Donation payment. Hope we get more donations ;-)
            // Redirect to institute frontpage URL
            $transaction = new Transaction();

            $donation = Donation::find($paymentDetails['data']['metadata']['donation_id']);

            $donation->update([
                'amount' => $paymentDetails['data']['amount'],
                'fees' => $paymentDetails['data']['fees'],
                'ip_address' => $paymentDetails['data']['ip_address'],
                'donor_email' => $paymentDetails['data']['customer']['email'],
                'donor_name' => $paymentDetails['data']['metadata']['name'],
                'user_id' => $paymentDetails['data']['metadata']['user_id'],
            ]);


            $transaction = new Transaction([
                'amount' => $paymentDetails['data']['amount'],
                'currency' => $paymentDetails['data']['currency'], // Assuming GHS currency
                'reference' => $paymentDetails['data']['reference'], // Assuming payment ID as reference
                'type' => 'donation',
                'fees' => $paymentDetails['data']['fees'],
                'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
                'orderID' => $donation->id,
                'transaction_date' => now(), // Set current date and time
                'description' => 'Donation payment', // Optional description
                'ipAddress' => $paymentDetails['data']['ip_address'],

            ]);

            $donation->transactions()->save($transaction);

            // Donation instance created. Redirect and thank you.
            app('flasher')->addSuccess('Thank you for your kind donation.', 'Donated Successfully!');
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



}
