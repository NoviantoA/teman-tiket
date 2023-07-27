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
        Schema::create('banks', function (Blueprint $table) {
            $table->id('bank_id');
            $table->integer('user_id');
            $table->string('bank_type');
            $table->string('bank_nomer_rekening')->nullable();
            $table->string('bank_nomer_hp')->nullable();
            $table->string('bank_name');
            $table->string('bank_name_user');
            $table->integer('bank_is_verified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
