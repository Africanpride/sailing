<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class DeleteStaff extends ModalComponent
{

    public User $user;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function mount(User $user)
    {
        $this->user = $user;
    }


    public function deleteStaff()
    {


        if(!Auth::check()) {
            app('flasher')->addError('Authentication', 'Authentication Required!');
            return redirect()->route('staff');
        }

        if(Auth::check() && Auth::user()->id == $this->user->id ) {
            app('flasher')->addError('You Cannot delete your own Account!');
            return redirect()->to('staff');
        }
        $this->user->delete();
        app('flasher')->addSuccess('success', 'Staff Account Deleted!');
        return redirect()->route('staff');
    }
    public function render()
    {
        return view('livewire.delete-staff');
    }
}
