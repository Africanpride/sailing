<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\Invoice;
use App\Models\Donation;
use App\Models\Institute;
use App\Models\Transaction;
use App\Enums\InvoiceStatus;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use App\Models\Application;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{



    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails && isset($paymentDetails['data']['metadata']['edition'])) {
            // Run logic for edition invoice payment.
            // Redirect to institute frontpage URL

            $invoice = Invoice::find($paymentDetails['data']['metadata']['invoice_id']);
            $edition = Edition::find($paymentDetails['data']['metadata']['edition_id']);
            $application = Application::find($paymentDetails['data']['metadata']['application_id']);

            $application->update([ "paid_for" => true ]);

            $application->invoice()->update([
                'status' => InvoiceStatus::Paid,
                'paid' => true
            ]);


            // Log transaction. We don't want to rely on only paystack  transactions as a source of truth.
            $transaction = new Transaction([
                'paystackTransactionID' => $paymentDetails['data']['id'],
                'amount' => $paymentDetails['data']['amount'],
                'currency' => $paymentDetails['data']['currency'],
                'reference' => $paymentDetails['data']['reference'],
                'type' => 'edition',
                'fees' => $paymentDetails['data']['fees'],
                'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
                'orderID' => $invoice->invoicee->id,
                'transaction_date' => now(), // Set current date and time
                'description' => 'Payment for ' . $edition->title, // Optional description
                'ipAddress' => $paymentDetails['data']['ip_address'],

            ]);

            $application->transactions()->save($transaction);

            //  Redirect and thank you.
            app('flasher')->addSuccess('Payment made for ' . $invoice->edition->title, 'Payment Successfull!');
            return redirect()->route('home');
        }


        if ($paymentDetails && isset($paymentDetails['data']['metadata']['donation'])) {
            // Run logic for Donation payment. Hope we get more donations ;-)
            // Redirect to institute frontpage URL

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
                'paystackTransactionID' => $paymentDetails['data']['id'],
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



    }



}
