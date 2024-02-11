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
        $exchange_rate = ExchangeRate::latest()->first();

        // Check if the exchange rate needs to be updated
        if ($exchange_rate == null || Carbon::parse($exchange_rate->updated_at)->diffInHours(Carbon::now()) >= 24) {
            // Fetch exchange rate from API and update database
            $response = Http::get('https://openexchangerates.org/api/latest.json', [
                'app_id' => config('app.openExchange'),
                'symbols' => 'GHS',
            ]);

            $responseData = $response->json();
            $exchange_rate_value = $responseData['rates']['GHS'];

            if (!empty($responseData)) {
                // Update the exchange rate in the database
                $exchange_rate = ExchangeRate::firstOrCreate(['rate' => $exchange_rate_value]);
            }
        }

        // Return the exchange rate (either the updated one or the existing one)
        return $exchange_rate->rate + 0.4;
    }
}

