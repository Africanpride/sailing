<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;
use Illuminate\Support\Facades\Auth;

class StartApplication extends Component

{

    public Institute $institute;
    public Edition $edition;
    public User $user;

    public function mount(Institute $institute)
    {
        $this->institute = $institute;
        $this->edition = $this->institute->editions()->latest()->first();

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
                if (!$this->user->applications()->where('edition_id', $this->edition->id)->exists()) {

                    $this->user->applications()->create([
                        'edition_id' => $this->edition->id,
                    ]);

                    app('flasher')->addSuccess('We shall get back to you shortly.', 'Application Received!');
                    $this->redirectRoute('home');
                } else {
                    // Application already exist for user  and edition
                    app('flasher')->addError('You have already applied for this Institute.',  $this->edition->title);
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
        return view('livewire.start-application');
    }
}
