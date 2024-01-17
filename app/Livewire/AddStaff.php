<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use App\Traits\PasswordResetNotification;


class AddStaff extends ModalComponent
{
    use PasswordResetNotification;
    public $firstName, $lastName, $email, $password, $availableRoles, $roles = [];
    public bool $resetPassword = false;
    public bool $active = false;


    protected $rules = [
        'firstName' => ['required', 'string', 'min:2', 'max:255'],
        'lastName' => ['required', 'string', 'min:2', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'active' => 'required|boolean',
        'resetPassword' => 'required|boolean',
        'password' => ['sometimes'],
        'roles' => ['nullable']
    ];

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
    protected static array $maxWidths = [

        '5xl' => 'max-w-2xl md:max-w-xl lg:max-w-3xl xl:max-w-5xl',

    ];

    public function addStaff()
    {
        $data = $this->validate();
        // dd($data);

        // persist data

        $user = User::create($data);
        // set password
        $user->forceFill([
            'password' => Hash::make($this->password),
            'must_create_password' => false,
            'staff' => true,
            'participant' => false,
        ])->save();

        // send reset password
        if ($this->resetPassword) {
            $this->sendPasswordResetLink($this->email);
        }
        if ($this->active) {
            $user->forceFill([
                'active' => true
            ])->save();
        }

        // because of ULID and UUID, the role id's need to be converted to integers else it would
        // see it as string. :-)
        $roles = collect($this->roles)->map(fn($roleId) => (int) $roleId)->toArray();
        $user->syncRoles($roles); // Use $user here

        app('flasher')->addSuccess('success', 'Staff Account Created!');
        return redirect()->to('staff');
    }


    public function render()
    {
        return view('livewire.add-staff');
    }
}
