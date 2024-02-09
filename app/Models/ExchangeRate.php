<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = ['rate'];

    protected $casts = [
        'rate' => 'decimal:6', // assuming exchange rate is a decimal number with 6 decimal places
    ];


}

