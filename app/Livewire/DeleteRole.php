<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteRole extends ModalComponent
{

    public Role $role;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function deleteRole(Role $role)
    {
        $this->role->delete();
        app('flasher')->addSuccess('success', 'Role Deleted successcully!');

        return redirect()->route('roles');
    }

    public function render()
    {
        return view('livewire.delete-role');
    }
}
