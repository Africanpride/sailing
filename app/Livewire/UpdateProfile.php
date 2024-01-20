<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public User $user;
    public $photo;
    public $profile;
    public $validatedData = [];
    public $userID;
    public $verificationLinkSent = false;

    public function mount()
    {
        $this->user = Auth::user();
        $this->profile = Auth::user()->profile;
        $this->userID = Auth::user()->id;
    }

    protected function rules()
    {
        return [
            'user.firstName' => 'required|string|min:2',
            'user.lastName' => 'required|string',
            'profile.title' => 'nullable|string',
            'profile.disabled' => 'nullable',
            'profile.gender' => 'nullable',
            'profile.dateOfBirth' => 'nullable|string|min:1',
            'profile.marital_status' => 'nullable',
            'profile.telephone' => 'nullable|string|min:9',
            'profile.address' => 'nullable|string',
            'profile.state' => 'nullable|string',
            'profile.city' => 'nullable|string',
            'profile.country' => 'nullable|string',
            'profile.zipcode' => 'nullable|string',
            'profile.emergencyContactName' => 'nullable|string',
            'profile.emergencyContactTelephone' => 'nullable|string',
            'profile.nationality' => 'nullable|string',
            'profile.profession' => 'nullable|string',
            'profile.bio' => 'nullable|string',
            'user.email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->userID),
            ],
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:1024',
        ];
    }

    public function sendEmailVerification()
    {
        $this->user->sendEmailVerificationNotification();

        $this->verificationLinkSent = true;
        app('flasher')->addSuccess('Email Verification Request Sent.', 'Success');
    }


    public function savePhoto()
    {

        $this->user->deleteProfilePhoto();
        $this->user->updateProfilePhoto($this->photo);
    }

    public function removeProfilePhoto()
    {
        $this->user->deleteProfilePhoto();
        return redirect()->route('profile.show');
    }

    public function saveProfile()
    {
        $validatedData = $this->validate();

        $newEmail = $validatedData['user']['email'];

        if (isset($validatedData['photo'])) {
            $this->user->updateProfilePhoto($validatedData['photo']);
        }

        if (isset($validatedData['user']['email']) && $this->user instanceof MustVerifyEmail && $validatedData['user']['email'] !== Auth::user()->email) {
            // Update the user's email address
            $this->user->forceFill([
                'firstName' => $validatedData['user']['firstName'],
                'lastName' => $validatedData['user']['lastName'],
                'email' => $newEmail,
                'email_verified_at' => null,
            ])->save();

            $this->profile->forceFill($validatedData['profile'])->save();

            // Send the verification email to the new email address
            $this->user->sendEmailVerificationNotification();

            app('flasher')->addSuccess('Profile Updated. Email Verification Request Sent.', 'Success');
        } else {
            $this->user->forceFill($validatedData['user'])->save();
            $this->profile->forceFill($validatedData['profile'])->save();
            app('flasher')->addSuccess('Profile Updated.', 'Success');
        }

        return redirect()->route('profile.show');
    }

    public function render()
    {
        return view('livewire.update-profile');
    }
}
