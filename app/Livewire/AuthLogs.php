<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AuthLogs extends Component
{

    // Public $logs;

    public function render()
    {


        $logs = DB::table('authentication_log')
        ->select('authentication_log.authenticatable_id', 'ip_address', 'login_at', 'login_successful', 'users.email'
        , 'users.firstName' , 'users.lastName', 'users.profile_photo_path')
        ->join('users', 'users.id', '=', 'authentication_log.authenticatable_id')
        ->paginate(7);

        // dd($logs);


        return view('livewire.auth-logs', compact('logs'));
    }
}
