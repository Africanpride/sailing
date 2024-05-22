<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use App\Traits\PasswordResetNotification;
use Illuminate\Auth\Notifications\ResetPassword;

class UpdateStaff extends ModalComponent
{
    use PasswordResetNotification;

    public User $user;
    public Role $role;
    public $firstName;
    public $lastName;
    public $email;
    public $roles;
    public $password;
    public bool $resetPassword = false;
    public bool $active = false;
    public $avatar;
    public array $staffRoles = [];

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

    public function mount(User $user)
    {
        $this->user         = $user;
        $this->firstName    = $user->firstName;
        $this->lastName     = $user->lastName;
        $this->email        = $user->email;
        $this->avatar       = $user->avatar_url;
        // Convert role IDs to strings to ensure compatibility with ULID and UUID
        $this->staffRoles = $user->roles->pluck('id')->map(fn($roleId) => (string) $roleId)->toArray();
        $this->active       = $user->active;
        $this->roles = Role::all(); // We shall check against this
    }

    public function updateStaff()
    {
        $data = $this->validate([
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'email' => 'required|unique:users,email,' . $this->user->id,
            'active' => 'required|boolean',
        ]);

        // Update user with validated details
        $this->user->update($data);

        // Activate staff account
        if ($this->active) {
            $this->user->makeVisible('active')->toArray();
            $this->user->forceFill([
                'active' => (bool) $this->active
            ])->save();
        }

        // Update user roles
        // Because of ULID and UUID, the role IDs need to be converted to integers
        $updatedRoles = collect($this->staffRoles)->map(fn ($roleId) => (int) $roleId)->toArray();
        $this->user->syncRoles($updatedRoles);

        // Send reset password
        if ($this->resetPassword) {
            $this->sendPasswordResetLink($this->user->email);
        }

        // Alert/Toast to show success
        app('flasher')->addSuccess('success', 'Staff Account Updated!');

        // Return to staff page
        return redirect()->to('staff');
    }

    public function render()
    {
        return view('livewire.update-staff');
    }
}
