<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edition extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'institute_id',
        'title',
        'slug',
        'name',
        'acronym',
        'overview',
        'about',
        'introduction',
        'banner',
        'startDate',
        'endDate',
        'seo',
        'active',
        'price',
    ];


    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'ulid';

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    // Create a transaction for a specific edition of an institute
    // $institute = Institute::find(1);
    // $edition = $institute->editions()->create(['name' => '2024 Edition']);
    // $transaction = $edition->transactions()->create(['amount' => 1000.00]);

}
