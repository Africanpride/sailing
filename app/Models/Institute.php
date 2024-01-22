<?php

namespace App\Models;

use App\Models\Edition;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Conversions\Manipulations;

// use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Institute extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $fillable = [
        'name',
        'acronym',
        'overview',
        'introduction',
        'about',
        'icon',
        'logo',
        'banner',
        'seo',
        'active',
        'slug',

    ];

    protected $appends = [
        'frontend_url',
        'institute_logo',
        'institute_banner_url',
        'services',
        'progress',
        'duration',
        'featured_image',
        'local_currency',

    ];

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    // Fetch institute logo attribute
    public function getInstituteLogoAttribute(): string
    {
        return asset("storage/{$this->logo}");
    }
    public function getFeaturedImageAttribute(): string
    {

        return ($this->getFirstMediaUrl('featured_image') != null) ? $this->getFirstMediaUrl('featured_image')  :  $this->getFirstMediaUrl('banner');
    }

    public function getFrontendUrlAttribute()
    {
        return route('institutes.show', ['slug' => $this->slug]);
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

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
