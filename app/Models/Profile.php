<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Lwwcas\LaravelCountries\Models\Country;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasUuids, HasFactory;


    protected $fillable = [
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
        'profession',
        'bio',
        'disabled',
        'avatar'
    ];

    public function getCountryFlagAttribute()
    {


        $country = $this->country ?? 'ghana'; // use null coalescing operator to set default value

        $response = Http::get("https://restcountries.com/v3.1/name/{$country}");
        $data = $response->json();

        if (!empty($data) && isset($data[0]['flag'])) {
            return $data[0]['flag'];
        } else {
            return null; // handle case where no flag is found
        }
    }

    // public function getCountryFlagAttribute()
    // {

    //     if(empty($this->country) || is_null($this->country)) {
    //         $this->country = 'ghana';
    //     }

    //     $response = Http::get("https://restcountries.com/v3.1/name/{$this->country}");
    //     $data = $response->json();
    //     return $data[0]['flag'];
    // }

    protected $casts = [
        'disabled' => 'boolean',
    ];

    protected $appends = [
        'profile_country'
    ];

    public function getNiceDateAttribute()
    {
        return Carbon::parse($this->dateOfBirth)->format('d-M-Y');
    }

    public function getParticipantAvatarAttribute(): string
    {
        $email = strtolower(trim($this->email));
        $hash = md5($email);
        if (!is_null($this->avatar)) {
            if (str_contains($this->avatar, 'placeholder')) {
                return $this->avatar;
            }
            return url('/') . "/storage/" .  $this->avatar;
        }

        return 'https://www.gravatar.com/avatar/' . $hash;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function getProfileCountryAttribute()
    {
        $country = Country::whereId($this->lc_country_id)->first();
        if ($this->lc_country_id) {
            return $country->name;
        }
        return 'ghana';
    }
}
