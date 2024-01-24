<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;

class AvailableRoles extends Component
{
    public function render()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('livewire.available-roles', compact('roles', 'permissions'));

    }
}
