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
        Schema::create('voting_results', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('result')->nullable();
            $table->string('photo_result')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreignId('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_results');
    }
};