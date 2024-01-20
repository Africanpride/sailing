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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('gender')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('profession')->nullable();
            $table->string('emergencyContactName')->nullable();
            $table->string('emergencyContactTelephone')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('bio')->nullable();
            $table->foreignUlid('user_id')->constrained()->onDelete('cascade');
            $table->boolean('disabled')->default(false);
            $table->string('avatar')->nullable();
            $table->integer('lc_country_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('lc_country_id')->references('id')->on('lc_countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
