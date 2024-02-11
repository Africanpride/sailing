<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use Unicodeveloper\Paystack\Facades\Paystack;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('isAdmin')) {
            // Return a 403 Forbidden error if the user is not authorized
            abort(403, 'You are not authorized to view this page');
            // return view('donate');
        }

        $donations = Donation::paginate(10);
        return view('admin.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required|numeric',
        ];

        // Conditional validation for non-anonymous donations
        if (!$request->has('anonymousDonation')) {
            $rules += [
                'name' => 'required',
                'email' => 'required|email',
            ];
        }

        // Validate input data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create a new donation record
        $donation = Donation::create([
            'amount' => $request->amount,
            'donor_name' => $request->name ?? 'Anonymous Donor',
            'donor_email' => $request->email ?? 'webmaster@costrad.org', // Set to null if anonymous
            'ip_address' => request()->ip(), // Use Laravel helper for IP address
            'user_id' => Donation::getDonor() ?? null, // Set to null if no user logged in
        ]);

        // Generate payment details (assuming it's dependent on the created donation)
        $ghsAmount = round($donation->amount * ($donation->getCurrentRate()) * 100);
        $reference = Paystack::genTranxRef();
        try {
            $paystackData = [
                "amount" => $ghsAmount,
                "reference" => $reference,
                "email" => $donation->donor_email,
                "currency" => config('app.currency'),
                "orderID" => $donation->id, // Use donation ID directly
                "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                "metadata" => [
                    "donation" => true,
                    "donation_id" => $donation->id,
                    "name" => $donation->donor_name,
                    "user_id" => $donation->user_id,
                    // Add other relevant metadata related to the donation
                ],
            ];

            // Redirect to Paystack payment gateway
            return Paystack::getAuthorizationUrl($paystackData)->redirectNow();
        } catch (\Exception $e) {
            dd($e);
            // Handle payment gateway errors
            // Consider rolling back the created donation if necessary
            $donation->delete();

            return back()->withErrors(['msg' => 'Paystack error: Please refresh and try again.']);
        }
    }



    // public function store(Request $request)
    // {
    //     $rules = [
    //         'amount' => 'required|numeric',
    //     ];

    //     // Conditional validation for non-anonymous donations
    //     if (!$request->has('anonymousDonation')) {
    //         $rules += [
    //             'name' => 'required',
    //             'email' => 'required|email',
    //         ];
    //     }

    //     // Validate input data
    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     // Generate donation details
    //     $donationID = Donation::generateOrderId();
    //     $user_id = Donation::getDonor();
    //     $exchangeRate = ExchangeRate::getExchangeRate();
    //     $email = Donation::getEmail($request->email);
    //     $ghsAmount = round($request->amount * (($exchangeRate + 0.50) * 100));
    //     $reference = Paystack::genTranxRef();

    //     try {
    //         $paystackData = [
    //             "amount" => $ghsAmount,
    //             "reference" => $reference,
    //             "email" => $email,
    //             "currency" => "GHS",
    //             "orderID" => $donationID,
    //             "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
    //             "metadata" => [
    //                 "donation" => true,
    //                 "orderID" => $donationID,
    //                 "name" => $request->name ?? 'Anonymous Donor',
    //                 "user_id" => $user_id,
    //             ],
    //         ];

    //         // Redirect to Paystack payment gateway
    //         return Paystack::getAuthorizationUrl($paystackData)->redirectNow();
    //     } catch (\Exception $e) {
    //         // Handle payment gateway errors
    //         return back()->withErrors(['msg' => 'Paystack error: Please refresh and try again.']);
    //     }
    // }


    // public function store(Request $request)
    // {


    //     $rules = [
    //         'amount' => 'required|numeric',
    //     ];

    //     // Apply additional rules if $anonymousDonation is false
    //     if (!$request->has('anonymousDonation')) {
    //         $rules['name'] = 'required';
    //         $rules['email'] = 'required|email';
    //     }

    //     $validator = Validator::make($request->all(), $rules);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         // Handle validation failure
    //         app('flasher')->addError('Missing Values Error', 'Error');
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $donationID = Donation::generateOrderId();
    //     $user_id = Donation::getDonor();
    //     // Get the exchange rate and other inputs for api
    //     $exchange_rate = ExchangeRate::getExchangeRate();
    //     $email = Donation::getEmail($request->email);
    //     $ghs_amount = $request->amount * (($exchange_rate + 0.50) * 100);
    //     $reference = Paystack::genTranxRef();
    //     try {
    //         $data = array(
    //             "amount" => round($ghs_amount),
    //             "reference" =>  $reference,
    //             "email" => $email,
    //             "currency" => "GHS",
    //             "orderID" => $donationID,
    //             "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
    //             "metadata" => [
    //                 "donation" => true,
    //                 "orderID" => $donationID,
    //                 "name" => (isset($request->name) ? $request->name : 'Anonymous Donor'),
    //                 "user_id" => $user_id,
    //                 ]
    //             );

    //             // dd("We are here");
    //         return Paystack::getAuthorizationUrl($data)->redirectNow();

    //     } catch (\Exception $e) {
    //         dd("Donation stopped...");
    //         return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
