<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Institute;
use Illuminate\Support\Facades\Auth;

class InstituteDetails extends Component
{
    public Institute $institute;

    public function mount(Institute $institute)
    {
        $this->institute = $institute;
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

    public function render()
    {
        $images = $this->institute->getMedia('banner')->take(6)->skip(1);
        return view('livewire.institute-details', compact('images'));
    }

}
