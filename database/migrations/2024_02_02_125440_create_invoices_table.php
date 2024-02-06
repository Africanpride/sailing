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
        Schema::create('invoices', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('invoice_number');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'paid', 'overdue', 'cancelled'])->default('pending'); // Assuming enum values
            $table->decimal('amount', 10, 2);
            $table->decimal('total', 10, 2);
            $table->boolean('paid')->default(false);
            $table->foreignUlid('user_id')->nullOnDelete();
            $table->foreignUlid('edition_id')->nullOnDelete();
            $table->foreignUlid('application_id')->nullOnDelete();
            $table->datetime('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
