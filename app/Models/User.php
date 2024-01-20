<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasUlids;
    use HasRoles;
    use Notifiable, AuthenticationLoggable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'timezone',
        'social_avatar',
        'facultyMember',
        'participant',
        'must_create_password',
        'staff',
        'active',
        'ban',
        'timezone',
        'google_id',
        'apple_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'facultyMember' => 'boolean',
        'participant' => 'boolean',
        'must_create_password' => 'boolean',
        'staff' => 'boolean',
        'active' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'name',
        'isLoggedIn',

    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';

    // public function getBanAttribute(): bool
    // {
    //     return $this->ban === 1 || $this->ban === true; // Adjust based on your data type
    // }

    public function publications(): hasMany
    {
        return $this->hasMany(Publication::class);
    }

    public function isBanned(): bool
    {
        return $this->ban === 1 || $this->ban === true; // Adjust based on your data type
    }

    public function toSearchableArray()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ];
    }

    public function getScoutKeyName(): mixed
    {
        return 'email';
    }

    public function GetUserGreetingsAttribute(): string
    {
        // Create a new Carbon instance using the current date and time
        $now = Carbon::now();

        // Get the hour of the day as a number (0-23)
        $hour = $now->hour;

        // Determine whether it is morning, afternoon, or evening based on the hour
        if ($hour >= 5 && $hour < 12) {
            $greeting = "Good morning";
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Good afternoon";
        } else {
            $greeting = "Good evening";
        }

        // Output the greeting
        return $greeting;
    }


    public static function searchParticipants($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('participant', true)
            ->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('firstName', 'like', '%' . $search . '%')
                    ->orWhere('lastName', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
    }

    // Scopes

    public function scopeFaculty(Builder $query): void
    {
        $query->where(function ($q) {
            $q->where('facultyMember', true)
                ->orWhereHas('roles', function ($q) {
                    $q->whereIn('name', ['faculty']);
                });
        });
    }
    public function scopeStaff(Builder $query): void
    {
        $query->where(function ($q) {
            $q->where('staff', true)
                ->orWhereHas('roles', function ($q) {
                    $q->whereIn('name', ['super_admin', 'admin']);
                });
        });
    }

    public function scopeParticipant(Builder $query): void
    {
        $query->where(function ($q) {
            $q->where('participant', true)
                ->orWhereHas('roles', function ($q) {
                    $q->whereIn('name', ['participant']);
                });
        })->where('active', 1);
    }

    // end scopes


    public function getUserRoleAttribute()
    {
        return $this->getRoleNames()->implode(' | ');
    }

    public function getFullNameAttribute(): string
    {
        return ucfirst($this->firstName) . ' ' . ucfirst($this->lastName);
    }
    public function getNameAttribute()
    {
        return ucfirst($this->firstName) . ' ' . ucfirst($this->lastName);
    }

    public function getisLoggedInAttribute(): bool
    {
        return Auth::check();
    }
    public function isLoggedIn(): bool
    {
        return Auth::check();
    }

    public function isOnline()
    {
        $timestamp = Carbon::parse('2 minute ago');
        return $this->last_seen > $timestamp;
    }


    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    public function isAdmin(): bool
    {
        return $this->hasAnyRole('admin', 'super_admin');
    }


    public function dashboard(): string
    {
        return $this->isAdmin() ? 'admin/dashboard' :  'dashboard';
    }


    public function getAvatarUrlAttribute()
    {
        $address = strtolower(trim($this->email));
        $hash = md5($address);
        return 'https://www.gravatar.com/avatar/' . $hash;
    }

    public function defaultProfilePhotoUrl()
    {
        if (empty($this->avatar) && !empty($this->social_avatar)) {
            return asset("storage/{$this->social_avatar}");
        }

        if (!empty($this->avatar)) {
            return $this->avatar;
        } else {

            $name = trim(collect(explode(' ', $this->full_name))->map(function ($segment) {
                return mb_substr($segment, 0, 1);
            })->join(' '));

            return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
        }
    }


    public function whois()
    {
        return Auth::user()->firstName;
    }

    public function institutes(): BelongsToMany
    {
        return $this->belongsToMany(Institute::class, 'institute_participant', 'participant_id', 'institute_id')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'bio' => 'We want to know more about you - update your bio once and showcase your unique story.',
                'country' => 'null'
            ]);
        });
    }
}
