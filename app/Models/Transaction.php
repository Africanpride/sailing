<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Transaction extends Model
{
    use HasFactory, HasUuid;
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
    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';
    public function transactionable()
    {
        return $this->morphTo();
    }


    //     // Create a transaction for a donation
    // $donation = Donation::find(1);
    // $transaction = $donation->transactions()->create(['amount' => 100.00]);

    // // Create a transaction for an edition
    // $edition = edition::find(1);
    // $transaction = $edition->transactions()->create(['amount' => 500.00]);

}