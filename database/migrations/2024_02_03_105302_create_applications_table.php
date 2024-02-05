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
        Schema::create('applications', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUlid('edition_id')->constrained();
            $table->foreignUlid('invoice_id')->nullable()->constrained()->nullOnDelete(); // Adjust the table name as needed
            $table->timestamp('submitted_at')->nullable();
            $table->boolean('approved')->default(false);
            $table->foreignUlid('approved_by')->nullable()->nullOnDelete(); // Adjust the table name as needed
            $table->boolean('paid_for')->default(false);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
