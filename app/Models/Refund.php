<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'transaction_id', // Foreign key to link with Transaction model
        'status',
        'message',
        'reversalReason',
        'data', // JSON field to store the refund data
    ];

    protected $casts = [
        'data' => 'json', // Specify that the 'data' field should be treated as JSON
        'status'=> 'boolean'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
