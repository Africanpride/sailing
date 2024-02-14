<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Transaction extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'amount',
        'currency',
        'reference', // Can store ID/identifier from source entity
        'type', // Can be "donation" or "edition"
        'transactionable_id', // ID of the related entity
        'transactionable_type', // Model name of the related entity ("App\Models\Donation" or "App\Models\edition")
        'fees',
        'authorization_code',
        'orderID',
        'transaction_date',
        'description',
        'ipAddress',
        'paystackTransactionID'
    ];

    protected $casts = [
        'transaction_date' => 'datetime:Y-m-d H:i:s',
    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';
    public function transactionable()
    {
        return $this->morphTo();
    }

    public static function generateReferenceNumber($length = 24)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $referenceNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $referenceNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $referenceNumber;
    }

    public static function totalMonthly()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->endOfMonth();

        $totalAmount = Transaction::whereBetween('transaction_date', [$currentMonth, $nextMonth])
            ->sum('amount');
        return $totalAmount;
    }

    protected function latestFormattedAmount()
    { {
            $latest = self::latest()->first();

            if ($latest) {
                return 'GHS ' . number_format($latest->amount / 100, 2, '.', ',');
            }

            // Handle the case where no records are available
            return 'No records found';
        }
    }



    public function refund()
    {
        return $this->hasOne(Refund::class, 'transaction_id');
    }


    //     // Create a transaction for a donation
    // $donation = Donation::find(1);
    // $transaction = $donation->transactions()->create(['amount' => 100.00]);

    // // Create a transaction for an edition
    // $edition = edition::find(1);
    // $transaction = $edition->transactions()->create(['amount' => 500.00]);

}
