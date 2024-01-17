<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Conversions\Manipulations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['title', 'slug', 'overview', 'body', 'description', 'featured_image'];
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'category_id');
    }


    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('category_image')
            // ->withResponsiveImages()
            ->singleFile();

        $this->addMediaConversion('banner')
            ->width(1024)
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(212)
            ->height(212)
            ->sharpen(10);

        $this->addMediaConversion('old-picture')
            ->sepia()
            ->border(10, 'black', $this->Manipulations::BORDER_OVERLAY);
    }
}
