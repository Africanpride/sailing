<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edition extends Model implements HasMedia
{
    use HasFactory, HasUlids, Sluggable, InteractsWithMedia;
    protected $fillable = [
        'institute_id',
        'title',
        'slug',
        'theme',
        'acronym',
        'overview',
        'about',
        'introduction',
        'banner',
        'startDate',
        'endDate',
        'seo',
        'active',
        'price',
    ];
    protected $casts = [
        'active' => 'boolean',
        'startDate' => 'datetime:d-m-Y',
        'endDate' => 'datetime:d-m-Y',
    ];


    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $appends = [
        'progress',

    ];

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function paidAttendees()
    {
        return $this->belongsToMany(User::class)->whereHas('transactions', function ($query) {
            $query->where('type', 'edition');
        });
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('featured_image')
            ->width(1024)
            ->height(500);

        $this->addMediaConversion('banner')
            ->width(1024)
            ->height(500)
            ->sharpen(10);

        $this->addMediaConversion('logo')
            ->width(300)
            ->height(300)
            ->sharpen(10);
    }

    function getProgressAttribute(): int
    {
        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        $currentDate = Carbon::now();

        // Calculate the total number of days between the start and end dates
        $totalDays = $start->diffInDays($end);

        // Calculate the number of elapsed days from the start date to the current date
        $elapsedDays = $start->diffInDays($currentDate);

        // Calculate the progress as a percentage
        $progress = round(($elapsedDays / $totalDays) * 100);

        // Check if the current date is greater than the end date
        if ($currentDate > $end) {
            return 100;
        }

        // Check if the current date is within the start and end dates
        if ($currentDate > $start) {
            return $progress;
        }

        return 0;
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    // Retrieve paid attendees for a specific edition
    // $edition = Edition::find($editionId);
    // $paidAttendees = $edition->paidAttendees;


    // Create a transaction for a specific edition of an institute
    // $institute = Institute::find(1);
    // $edition = $institute->editions()->create(['name' => '2024 Edition']);
    // $transaction = $edition->transactions()->create(['amount' => 1000.00]);

}
