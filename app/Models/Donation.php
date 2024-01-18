<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [

        'amount',
        'fees',
        'donor_name',
        'donor_email',
        'ip_address',
        'user_id'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public function getRouteKeyName()
    {
        return 'id';
    }
    public static function getEmail($email)
    {
        if(Auth::check()) {
           return Auth::user()->email;
        }

        if(!is_null($email)) {
            return $email;
        }

        return config('app.email');
    }
    public static function getDonor()
    {
        // Default donor is webmaster ;-) because we'll have to say thank you!
        $defaultDonor = User::whereEmail(config('app.email'))->first();
        if(Auth::check()) {
           return Auth::user()->id;
        }

        return $defaultDonor->id;
    }

    public static function generateOrderId()
    {
        return Str::random(10) . '-' . 'donation';
    }

    public function donor()
    {
        $this->belongsTo(User::class);
    }
}
