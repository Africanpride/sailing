<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Invoice; // Assuming your Invoice model is in the App\Models namespace

class InvoiceReceiptController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $invoice_number)
    {

        $receipt = Invoice::where('invoice_number', $invoice_number)->where('status', 'paid')->with('invoicee', 'edition')->first();

        // only invoicee and Admin can see a particular receipt
        abort_unless($receipt && $receipt->invoicee->id = auth()->user()->id
        || $receipt && auth()->user()->isAdmin, 403,'Page Does Not Exist!');

        return view('invoices.receipt', compact('receipt'));
    }
}
