<?php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->nullable()->default('GHS');
            $table->string('reference')->nullable();
            $table->text('type')->nullable();
            $table->foreignUlid('transactionable_id');
            $table->string('transactionable_type');
            $table->decimal('fees', 10, 2);
            $table->string('authorization_code')->nullable();
            $table->string('orderID')->nullable();
            $table->timestamp('transaction_date');
            $table->text('description')->nullable();
            $table->string('ipAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
