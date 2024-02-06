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
        'approved_by',
        'paid_for',
        'status',

    ];
    protected $dates = [
        'submitted_at', // Automatically cast 'submitted_at' to a Carbon instance
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
        'paid_for' => 'boolean',
    ];

    protected $attributes = [
        'status' => ApplicationStatus::Pending,
    ];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';


    public static function searchApplicants($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('applicant', true)
            ->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('firstName', 'like', '%' . $search . '%')
                    ->orWhere('lastName', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function invoice()
    {
        return $this->HasOne(Invoice::class,'application_id');
    }
}
