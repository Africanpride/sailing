<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use LivewireUI\Modal\ModalComponent;

class UpdateRole extends ModalComponent
{
    public $name;
    public $description;
    public $permissions;
    public array $rolePermissions = [];
    public Role $role;
    public $permissionIds;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->rolePermissions = $role->permissions->pluck('id')->toArray();
        $this->description = $role->description;
        $this->permissionIds = $role->permissions->pluck('id')->toArray();
        $this->permissions = Permission::all(); // we shall check against this
    }

    public function updateRole()
    {
        $validated = $this->validate([
            'name' => 'required|min:3|unique:roles,name,'.$this->role->id,
            'description' => 'nullable|min:3',
        ]);
        // dd($this->rolePermissions);
        $this->role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        // dd($this->rolePermissions);

        $permissions = collect($this->rolePermissions)->map(fn($permissionId) => (int) $permissionId)->toArray();
        $this->role->syncPermissions([...$permissions]);

        app('flasher')->addSuccess('success', 'Role Updated successcully!');

        return redirect()->route('roles');

    }
    public function render()
    {
        return view('livewire.update-role');
    }
}
