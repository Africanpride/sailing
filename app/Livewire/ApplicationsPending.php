<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Edition;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Application;
use Livewire\WithPagination;
use App\Enums\ApplicationStatus;
use App\Enums\InvoiceStatus;
use App\Mail\ApplicationApproved;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ApplicationsPending extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $orderBy = 'created_at';
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

    public $scholarship = false;


    public function approveApplication($application)
    {
        // fetch user, $edition, $application
        $applicant = User::find($application['user_id']);
        $edition = Edition::find($application['edition_id']);

        // Update the status of the application to approved.
        // Fetch the application instance
        $application = Application::findOrFail($application['id']);

        // Update the status of the application to approved.
        $application->update([
            'status' => ApplicationStatus::Approved,
            'approved' => true,
            'approved_by' => auth()->user()->id,
            'updated_at' => now(),
        ]);

        $invoice = $application->invoice()->create([
            "amount" => $edition->price,
            "total" => $edition->price,
            'user_id' =>  $applicant->id,
            'edition_id' =>  $edition->id,
            'due_date' => now(),
        ]);


        // Generate  a PDF and send it to the applicant.
        if (config('mail.enabled')) {
            try {

                Mail::to($applicant)->queue(new ApplicationApproved($edition, $applicant));
            } catch (\Exception $e) {
                session()->flash('error', __(
                    "
                    An error occurred while sending an email notification about your application being accepted: :msg",
                    ['msg' => $e->getMessage()]
                ));
                Log::error("Error sending email: " . $e->getMessage());
            }
        }

        dd('done...');

        session()->flash('success', 'The application has been successfully approved');


        // Generate invoice  for the payment of the edition fees.
        if ($edition->fees > 0 && !$application->invoiced) {
            Invoice::createInvoiceForEditionFee($edition, $application);
            $application->update(['invoiced' => true]);
        }
        return redirect()->route('admin.dashboard');


        //  Send an email with the Invoice attached to it requesting for payment



        // dispatch application-approved notification
        app('flasher')->AddSuccess('Application Approved', 'Application Approved');

        // redirect  back to applications page.
        return redirect()->route('applications');
    }


    public function rejectApplication($application)
    {
        // dd($param['user_id']);
        $user = User::find($application['user_id']);
        dd("rejecting Application " . $user->full_name);
    }


    public function toggleBan($param)
    {
        $user = User::find($param['id']);
        $user->ban = !$user->ban;
        $user->save();

        if ($user->ban) {
            app('flasher')->addSuccess('success',  $user->firstName  . ' Account Suspended!');
        } else {
            app('flasher')->addSuccess('success',  $user->firstName  . ' Account Un-suspended');
        }
    }

    // public function deletePost($param)
    // {
    //    dd($param);
    // }

    public function selectedValue()
    {
        // Get the selected values to display in delete-confirmation modal

        if (!empty($this->selected)) {

            foreach ($this->selected as $id) {

                $deleting = User::find(['id' => $id])->pluck('full_name')->first();
                // return $deleting;
                dd($deleting);
            }
        }
    }
    public function updatedselectAllVisible($value)
    {
        // dd($value);
        if ($value) {
            # code...
            $selected = User::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
            dd($selected);
        }
    }


    public function callFunction()
    {
        $this->message = "You clicked on button";
    }

    public function deleteUser()
    {

        if (count($this->selected) > 0) {
            foreach ($this->selected as $id) {
                $user = User::where('id', $id)->first();
                $user->articles->each->delete();
                $user->profile->delete();
                $user->delete();
            }
            $this->selected = [];
        }
        $this->selected = [];
    }

    // public function paginationView()
    // {
    //     return 'custom-pagination-links-view';
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


        $applications = Application::where(function ($query) {
            $query->where('status', 'pending');
                // ->where('paid_for', false);
        })
            ->with('applicant', 'edition')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);


        // dd($applications);


        return view('livewire.applications-pending', compact('applications'));
    }
}
