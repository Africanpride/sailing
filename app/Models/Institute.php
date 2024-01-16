<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Conversions\Manipulations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Spatie\Image\Manipulations;
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
        // 'startDate',
        // 'endDate',
        // 'price'
    ];

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
