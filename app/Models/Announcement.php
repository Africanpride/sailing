<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{

    use HasFactory, HasUlids, Sluggable;


    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'icon',
        'user_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
