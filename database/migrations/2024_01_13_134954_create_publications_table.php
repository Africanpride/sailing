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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            // $table->ulid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->longText('body');
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('like')->default(0);
            $table->boolean('active')->default(true);
            $table->foreignUlid('user_id')->constrained()->nullable();
            // $table->foreignId('user_id')->constrained();

            $table->foreignId('category_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
