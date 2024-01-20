<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AuthenticationLogs extends Component
{

    public function render()
    {

        $logs = DB::table('authentication_log')
        ->select('authentication_log.authenticatable_id', 'ip_address', 'login_at', 'login_successful', 'users.email')
        ->join('users', 'users.id', '=', 'authentication_log.authenticatable_id')
        ->get();


        return view('livewire.authentication-logs');
    }
}
