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
        Schema::create('web_config', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->string('photo');
            $table->string('name');
            $table->string('password');
            $table->string('pin');
            $table->string('phone_number');
            $table->boolean('strict')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_config');
    }
};