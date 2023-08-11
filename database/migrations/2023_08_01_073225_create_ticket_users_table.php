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
        Schema::create('ticket_users', function (Blueprint $table) {
            $table->id("ticket_user_id");
            $table->integer("transaction_id");
            $table->string("ticket_user_email");
            $table->string("ticket_user_name");
            $table->string("ticket_user_phone");
            $table->string("ticket_user_bdate");
            $table->string("ticket_user_gender");
            $table->string("ticket_user_address");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_users');
    }
};
