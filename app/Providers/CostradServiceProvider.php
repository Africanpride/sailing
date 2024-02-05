<?php

namespace App\Providers;

use App\Models\Edition;
use App\Models\Institute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CostradServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    private function calculateProfileCompletionPercentage()
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

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer(['tabs'], function($view) {
            $instiutes = Institute::all();
            $profile = optional(Auth::user())->profile;
            $view->with('institutes', Institute::OrderBy('name')->with('editions')->get());

            // Return 0 if the user is not authenticated or doesn't have a profile
            return $profile ? $this->calculateProfileCompletionPercentage() : 0;

        });
        // View::share(['*'], function () {
        //     // Use the optional helper to handle optional properties
        // });
    }
}
