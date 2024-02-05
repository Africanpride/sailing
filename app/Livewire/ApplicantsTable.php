<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicantsTable extends Component
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


    public function approveApplication($user)
    {
        // fetch user, $edition, $application

        dd($user);

        //  Update the status of the application to approved.


        // Generate  a PDF and send it to the applicant.

        // Generate invoice  for the payment of the edition fees.

        //  Send an email with the Invoice attached to it.

        // dispatch application-approved notification
        app('flasher')->AddSuccess('Application Approved', 'Application Approved');

        // redirect  back to applications page.
        return redirect()->route('applications');


        }


    public function rejectApplication($param)
    {
        $user = User::find($param['id']);
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
        $users = User::searchParticipants($this->search)
            ->whereHas('applications', function ($query) {
                $query->where('status', 'pending');
            })
            ->with('attendedEditions', 'applications')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.applicants-table', compact('users'));
    }
}
