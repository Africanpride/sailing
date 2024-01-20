<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Conversions\Manipulations;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Publication extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'active', 'overview', 'body','like', 'featured_image', 'user_id'];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $appends = [
        'frontend_url',
        'publication_image',
        'estimated_read_time',
        'publication_image',

    ];

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function getFrontendUrlAttribute() : string
    {
        return url('/') . "/" . $this->slug;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }




    public function GetEstimatedReadTimeAttribute()
    {
        // Assume $articleContent contains the text of the article
        $wordCount = str_word_count(strip_tags($this->body)); // Count the number of words
        $readingTime = ceil($wordCount / 200); // Estimate reading time based on average reading speed
        return $readingTime . ' min read'; // Display estimated reading time in minutes

    }
    public function getPublicationImageAttribute(): string
    {
        // Check if featured_image is set
        if ($this->featured_image) {
            return asset("storage/{$this->featured_image}");
        } else {
            // Return the URL of your default image
            return asset("/public/images/main/banner2.jpg");
        }
    }




    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit($this->Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('featured_image')
            ->width(1024)
            ->height(500)
            ->sharpen(10);

        $this->addMediaConversion('banner')
            ->width(1024)
            ->height(500)
            ->sharpen(10);

        $this->addMediaConversion('logo')
            ->width(300)
            ->height(300)
            ->sharpen(10);
    }
}
