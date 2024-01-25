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
        Schema::create('editions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->unsignedBigInteger('institute_id'); // Foreign key for Institute
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('theme')->nullable();
            $table->string('acronym')->nullable();
            $table->text('overview')->nullable();
            $table->text('about')->nullable();
            $table->text('introduction')->nullable();
            $table->string('banner')->nullable();
            $table->date('startDate')->default(now()->toDateString()); // Use date type
            $table->date('endDate')->default(now()->toDateString()); // Use date type
            $table->string('seo')->nullable();
            $table->boolean('active')->nullable()->default(true);
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};
