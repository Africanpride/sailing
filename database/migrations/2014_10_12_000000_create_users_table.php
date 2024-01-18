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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->ulid('id')->primary();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('social_avatar')->nullable();
            $table->boolean('facultyMember')->default(false);
            $table->boolean('participant')->default(true);
            $table->boolean('must_create_password')->default(false);
            $table->boolean('staff')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('ban')->default(false);
            $table->string('google_id')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
