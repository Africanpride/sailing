<?php

namespace App\Traits;

use App\Models\ExchangeRate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

trait HasExchangeRate
{
    public static function getExchangeRate()
    {
        $exchange_rate = ExchangeRate::latest()->first(); // get the latest exchange rate from the database

        if ($exchange_rate == null || Carbon::parse($exchange_rate->updated_at)->diffInHours(Carbon::now()) >= 24) {
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
        } elseif ($exchange_rate != null && Carbon::parse($exchange_rate->updated_at)->diffInHours(Carbon::now()) < 24) {
            return $exchange_rate->rate;
        } else {
            return $exchange_rate->rate;
        }

        return $exchange_rate->rate;
    }
}
