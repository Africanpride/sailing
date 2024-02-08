<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Application;

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

    public function payInvoice($invoice) {
        dd($invoice['id']);
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
