<?php

namespace App\Models;

use App\Models\Status;
use App\Models\Invoice;
use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'user_id',
        'edition_id',
        'invoice_id',
        'approved',
        'approved_by',
        'paid_for',
        'status',
        'submitted_at',

    ];
    protected $dates = [
        'submitted_at', // Automatically cast 'submitted_at' to a Carbon instance
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
        'approved' => 'boolean',
    ];

    protected $attributes = [
        'status' => ApplicationStatus::Pending,
    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class);
    }
    public function invoice()
    {
        return $this->HasOne(Invoice::class);
    }
}
