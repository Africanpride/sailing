<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        // Gate::before(function ($user, $ability) {
        //     return $user->hasRole('super_admin') ? true : null;
        // });

        Gate::define('isParticipant', function ($user) {
            return $user->participant === 1 ||  $user->participant === true;
        });

        Gate::define('isAdmin', function ($user) {
            return $user->hasAnyRole(['admin', 'super_admin']);
        });

        // Gate::define('userEnrolled', function ($user, Institute $institute) {
        //     return Invoice::where('participant_id', $user->id)->where('institute_id', $institute->id)->first();
        // });
        // Gate::define('pendingInvoices', function ($user) {
        //     return Invoice::where('participant_id', $user->id)->where('status','pending')->first();
        // });
    }
}
