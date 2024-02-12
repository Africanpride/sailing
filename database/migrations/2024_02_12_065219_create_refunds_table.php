<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(Transaction::class)->constrained(); // Foreign key linking to transactions table
            $table->boolean('status');
            $table->string('message');
            $table->text('reversalReason');
            $table->json('data'); // JSON field to store refund data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
