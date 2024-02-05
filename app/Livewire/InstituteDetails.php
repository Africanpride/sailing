<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;
use App\Models\Application;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InstituteDetails extends Component
{
    public Institute $institute;
    public Edition $edition;
    public User $user;

    public function mount(Institute $institute)
    {
        $this->institute = $institute;
        $this->edition = $institute->editions()->latest()->first();

        if (Auth::check()) {
            $this->user = Auth::user();
        }
    }

    public function application()
    {
        // Check if user is logged in
        if (Auth::check()) {
            // Check if profile is complete
            $profilePercentage = new ProfilePercentage();
            $percentage = $profilePercentage->calculateProfileCompletionPercentage();

            if ($percentage < 90) {
                app('flasher')->addWarning('Kindly complete profile', 'Profile Incomplete!');
                $this->redirectRoute('profile.show');
            } else {
                // if/else block to check if user is already registered or enrolled

                // Create the application if none exist for user in current edition
                if(!$this->user->applications()->where('edition_id', $this->edition->id)->exists())
                {

                    $this->user->applications()->create([
                        'edition_id' => $this->edition->id,
                    ]);

                    app('flasher')->addSuccess('We shall get back to you shortly.', 'Application Received!');
                    $this->redirectRoute('home');
                } else {
                    // Application already exist for user  and edition
                    app('flasher')->addError('You have already applied for this Institute.',  $this->edition->title );
                    $this->redirectRoute('home');
                }
            }
        } else {
            app('flasher')->addWarning('Login/Signup', 'Login Required to Join Institute');
            $this->redirectRoute('login');
        }
    }


    public function render()
    {
        $images = $this->institute->getMedia('banner')->take(6)->skip(1);
        return view('livewire.institute-details', compact('images'));
    }
}


    // public function instituteAlreadyEnrolled()
    // {

    //     if (Auth::check()) {
    //         $transaction = Transaction::where('participant_id', Auth::user()->id)->where('institute_id', $this->institute->id)->first();
    //         if (!is_null($transaction) && ($this->institute->created_at->year === $transaction->created_at->year)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
