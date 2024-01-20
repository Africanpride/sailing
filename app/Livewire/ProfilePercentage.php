<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfilePercentage extends Component
{

    function calculateProfileCompletionPercentage()
    {
        $profile = Auth::user()->profile;
        $filledAttributes = 0;
        $totalAttributes = count($profile->getAttributes());


        $profileAttributes = [
            'title',
            'gender',
            'dateOfBirth',
            'marital_status',
            'address',
            'city',
            'country',
            'state',
            'zipcode',
            'country',
            'telephone',
            'emergencyContactName',
            'emergencyContactTelephone',
            'nationality',
            'bio',
            'disabled',
        ];


        foreach ($profileAttributes as $attribute) {

            if ($profile->{$attribute} !== null && $profile->{$attribute} !== '') {
                $filledAttributes++;
            }
        }


        $percentage = ($filledAttributes / count($profileAttributes) * 100);

        return $percentage;
    }

    public function render()
    {
        return view('livewire.profile-percentage');
    }
}
