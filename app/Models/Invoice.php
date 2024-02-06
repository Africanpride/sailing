<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'user_id',
        'edition_id',
        'application_id',
        'invoice_number',
        'due_date',
        'description',
        'status',
        'amount',
        'total',
        'paid',

    ];

    protected $casts = [
        'date' => 'datetime',
        'due_date' => 'datetime',
        'status' => InvoiceStatus::class
    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';

    protected $attributes = [
        'status' => InvoiceStatus::Pending,
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function invoicee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    protected static function generateUniqueInvoiceNumber()
    {
        // Logic to generate a unique invoice_number, e.g., combining date and a random string
        return '0000' . date('Ymd') . '-' . strtoupper(Str::random(8));
    }

    protected static function boot()
    {
        parent::boot();

        // Creating event to generate invoice_number
        static::creating(function ($invoice) {
            // Generate a unique invoice_number
            $invoice->invoice_number = static::generateUniqueInvoiceNumber();
        });
    }
}
