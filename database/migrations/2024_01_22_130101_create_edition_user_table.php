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
        Schema::create('edition_user', function (Blueprint $table) {
            $table->ulid()->primary();
            $table->ulid('edition_id');
            $table->ulid('user_id');
            $table->unique(['edition_id', 'user_id']);
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edition_user');
    }
};
