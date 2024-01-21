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
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->longText('body');
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('like')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('approved')->default(false);
            $table->foreignUlid('user_id')->constrained()->nullable();
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
