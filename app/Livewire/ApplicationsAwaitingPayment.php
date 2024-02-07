<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Application;
use Livewire\WithPagination;

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


    public function scholarshipDetails() {
        dd("cool...");
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
