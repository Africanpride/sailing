<?php

namespace App\Traits;

use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Auth\PasswordBroker;

trait PasswordResetNotification
{
    public function sendPasswordResetLink($email)
    {
        // Validate the email address
        // $this->validate([
        //     'email' => 'required|email',
        // ]);

        // Send the password reset link
        $status = $this->broker()->sendResetLink(
            ['email' => $email]
        );

        // Set the appropriate message based on the result of the password reset link request
        // if ($status == Password::RESET_LINK_SENT) {
        //     session()->flash('success', 'A password reset link has been sent to your email address.');
        // } else {
        //     session()->flash('error', 'There was an error sending the password reset link.');
        // }
    }

    protected function broker(): PasswordBroker
    {
        return Password::broker();
    }
}
