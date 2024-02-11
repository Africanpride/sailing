<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Edition;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class MyApplicationData extends Component
{

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $selected = [];
    public $message = 'Delete';
    public $selectAllCheckboxes = false;
    public $selectPage = false;
    public User $user;
    public string $param;
    public $checked = "";
    public $selectCheckbox = [];
    public $selectAllVisible = false;

    public function payInvoice($applicationInvoice)
    {
        $applicationInvoice = Invoice::where('invoice_number', $applicationInvoice['invoice_number'])->where('status', 'pending')->with('invoicee', 'edition')->first();
        // dd($applicationInvoice);

        try {
            $payStackData = array(
                "amount" => round($applicationInvoice->amount * $applicationInvoice->getCurrentRate() * 100),
                "reference" =>  Paystack::genTranxRef(),
                "email" => $applicationInvoice->invoicee->email,
                "currency" => "GHS",
                "orderID" => $applicationInvoice->invoice_number,
                "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                "metadata" => [
                    // "donation" => true,
                    "orderID" => $applicationInvoice->id,
                    "name" => $applicationInvoice->invoicee->full_name,
                    "user_id" => $applicationInvoice->user_id,
                ]
            );

            dd("We are here");
            return Paystack::getAuthorizationUrl($payStackData)->redirectNow();
        } catch (\Exception $e) {

            app('flasher')->AddError('Payment for ' . $applicationInvoice->edition->title . ' Failed!', 'payment Failed' );
            return redirect()->route('my-applications');
        }
    }

    // private function preventDuplicateInstituteTransaction($editionID)
    // {
    //     $edition = Edition::find($editionID);

    //     if (!$edition) {
    //         app('flasher')->addError('Edition not found.', 'Error');
    //         return redirect()->back();
    //     }

    //     $user = Auth::user();

    //     if (!$user) {
    //         app('flasher')->addError('User not authenticated.', 'Error');
    //         return redirect()->back();
    //     }

    //     $transaction = Transaction::where('participant_id', $user->id)->where('institute_id', $id)->first();

    //     if ($transaction && $institute->created_at->year == $transaction->created_at->year) {
    //         app('flasher')->addWarning('You have already enrolled in this institute.', 'Already Enrolled');
    //         return redirect()->route('institute.show', $institute);
    //     }

    //     // Continue with the rest of your logic
    // }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {

        $this->reset('search');
    }
    public function render()
    {


        $myApplications = Application::where('user_id', auth()->user()->id)
            ->with('invoice', 'edition')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.my-application-data', compact('myApplications'));
    }
}
