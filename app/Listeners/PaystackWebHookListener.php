<?php

namespace App\Listeners;

use App\Models\Transaction;
use Myckhel\Paystack\Events\Hook;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\MyckhelPaystackEventsHook;
use App\Models\Refund;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaystackWebHookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Hook $event): void
    {


    }
}
