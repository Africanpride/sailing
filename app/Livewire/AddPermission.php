<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Permission;
use LivewireUI\Modal\ModalComponent;

class AddPermission extends ModalComponent
{


    public $name;
    public $description;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public static function closeModalOnClickAway(): bool
{
    return false;
}
    protected $rules = [
        'name' => ['required', 'string', 'min:3', 'max:255', 'unique:permissions'],
        'description' => ['nullable', 'string', 'min:3', 'max:255'],
    ];
    public function addPermission()
    {
        $validatedData = $this->validate();
        $permission =  Permission::create(
            [
                'name' => $this->name,
                'description' => $this->description,
            ]
        );

        app('flasher')->addSuccess('success', 'New Permission Created!');
        return redirect()->route('roles');
    }
    public function render()
    {
        return view('livewire.add-permission');
    }
}
