<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UnverifiedEmail extends Component
{
    public User $user;

    public function mount () {
        $this->user = Auth::user();
    }

    public function sendEmailVerification()
    {
        $this->user->sendEmailVerificationNotification();

        $this->user->verificationLinkSent = true;
        app('flasher')->addSuccess('Email Verification Request Sent.', 'Success');
    }

    public function render()
    {
        return view('livewire.unverified-email');
    }
}
