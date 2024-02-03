<?php

namespace App\Models;

use App\Models\Status;
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
    'submitted_at',
    'approved',
    'approved_by',
    'paid_for',
    'status',

   ];



   public function edition()
   {
       return $this->belongsTo(Edition::class);
   }

   public function applicant()
   {
       return $this->belongsTo(User::class);
   }
}
