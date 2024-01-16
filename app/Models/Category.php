<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'icon',
        'logo'

    ];

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'category_id');
    }
}
