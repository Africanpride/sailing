<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Application;
use App\Models\Invoice;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Redirect;

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
        dd($applicationInvoice->getExchangeRate());

        try {
            $data = array(
                "amount" => round( $applicationInvoice->getExchangeRate() * 100),
                "reference" =>  $applicationInvoice->invoicee->id,
                "email" => $applicationInvoice->invoicee->email,
                "currency" => "GHS",
                "orderID" => $applicationInvoice->invoice_number,
                "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                "metadata" => [
                    "donation" => true,
                    "orderID" => $applicationInvoice->id,
                    "name" => $applicationInvoice->invoicee->full_name,
                    "user_id" => $applicationInvoice->user_id,
                ]
            );

            // dd("We are here");
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            dd("Donation stopped...");
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

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
