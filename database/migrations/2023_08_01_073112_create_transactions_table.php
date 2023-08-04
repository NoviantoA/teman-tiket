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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id("transaction_id");
            $table->integer("event_id");
            $table->integer("ticket_id");
            $table->integer("user_id");
            $table->integer("transaction_ticket_count");
            $table->integer("transaction_ppn");
            $table->integer("transaction_app_service");
            $table->integer("transaction_total");
            $table->integer("transaction_is_paid");
            $table->timestamp("transaction_end_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
