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

    public static function getExchangeRate()
    {
        $exchange_rate = ExchangeRate::latest()->first(); // get the latest exchange rate from the database

        if (!$exchange_rate || Carbon::parse($exchange_rate->updated_at)->diffInHours(Carbon::now()) >= 24) {
            // fetch exchange rate from API and update database
            $response = Http::get('https://openexchangerates.org/api/latest.json', [
                'app_id' => config('app.openExchange'),
                'symbols' => 'GHS'
            ]);

            $responseData = $response->json();
            $exchange_rate_value = $responseData['rates']['GHS'];


            if (!empty($responseData)) {

                $newRate = ExchangeRate::firstOrCreate(['rate' => $exchange_rate_value]);

                // update $exchange_rate variable with the latest value
                return $newRate->rate;
            }

        }

        return $exchange_rate->rate;
    }
}

