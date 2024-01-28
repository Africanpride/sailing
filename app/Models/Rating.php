<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{

    use HasUlids;
    use HasFactory;

    protected $fillable = [
        'comment',
        'status',
        'ratingValue'
    ];

    protected $casts = [
        'ratingValue' => 'int',
        'status' => 'boolean'
    ];

    // Define a morphTo relationship for the rated model
    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }
}
