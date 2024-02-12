<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Application;
use App\Models\Transaction;
use App\Enums\InvoiceStatus;
use Livewire\WithPagination;
use App\Enums\ScholarshipStatus;

class ApplicationsAwaitingPayment extends Component
{

    use WithPagination;

    public $perPage = 5;
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

    public $fullScholarship = false;
    public $partialScholarship = false;
    public $cashPaymentAmount;

    public $cediEquivalent;

    public $paymentOption = '';

    public function mount()
    {
        $this->paymentOption = 'fullPayment'; // Or any default value you prefer
    }
    public function cashPayment($applicationID)
    {
        // fetch the application with the parsed application ID
        $application = Application::where('id', $applicationID)
        ->with('applicant', 'invoice', 'edition')
        ->first();



        // if option is full payment
        if ($this->paymentOption == "fullPayment") {
            $application->paid_for = true;
            $application->save();

            // update invoice accordingly
            $application->invoice->update([
                'status' => InvoiceStatus::Paid,
                'paid' => true
            ]);

            // Create a new transaction to store the payment details
            $application->transactions()->create([
                'amount' => $application->edition->cedi_equivalent * 100 , // We are storing in pessewas
                'currency' => 'GHS',
                'reference' => $this->generateReferenceNumber(),
                'type' => 'Cash Payment',
                'fees' => 0.00,
                'orderID' => $application->applicant->id,
                'transaction_date' => now(),
                'description' => 'Cash payment for ' . $application->edition->title,
                'ipAddress' => request()->ip(), // Get the IP address from the request
            ]);

            app('flasher')->addSuccess('Cash payment has been successfully processed.', 'Payment Successful');
            return redirect()->route('applications');

        } else {
            // option is part payment
            dd("Part payment");
        }
    }

    public function awardScholarship($applicationID)
    {
        $application = Application::where('id', $applicationID)
            ->with('applicant', 'invoice', 'edition')
            ->first();

        // Check if the application is eligible for a scholarship
        if ($this->isScholarshipEligible($application)) {
            // Assuming $this->scholarshipAmount is set elsewhere or retrieved from a configuration
            $scholarshipAmount = $this->scholarshipAmount;

            // Award scholarship by updating the application
            $application->update([
                'scholarship_amount' => $scholarshipAmount,
                'scholarship_status' => ScholarshipStatus::Awarded,
            ]);

            // Optionally, you might want to update the application status as well
            $application->update([
                // 'status' => ApplicationStatus::awarded,
            ]);

            // Add a flash message or any other notifications
            session()->flash('success', 'Scholarship awarded successfully.');
        } else {
            session()->flash('error', 'Application is not eligible for a scholarship.');
        }
    }

    // Check if the application is eligible for a scholarship
    protected function isScholarshipEligible(Application $application)
    {
        // Add your eligibility criteria here
        // For example, you might check the applicant's GPA, specific conditions, etc.
        // Return true if eligible, false otherwise
        return true;
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


    public function generateReferenceNumber($length = 24)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $referenceNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $referenceNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $referenceNumber;
    }

    public function render()
    {

        $unpaidApplications = Application::where(function ($query) {
            $query->where('status', 'approved')
            ->where('paid_for', false);
        })
        ->with('applicant', 'edition')
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        // dd($unpaidApplicants);

        return view('livewire.applications-awaiting-payment',compact('unpaidApplications'));
    }
}
