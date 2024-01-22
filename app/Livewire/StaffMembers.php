<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class StaffMembers extends Component
{
    public function render()
    {
        return view('livewire.staff-members', ['staffs' => User::Staff()->paginate(8)]);
    }
}
