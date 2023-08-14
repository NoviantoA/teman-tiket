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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->integer("user_id");
            $table->integer("wishlist_id");
            $table->integer("talent_id");
            $table->integer("event_price");
            $table->string("event_name");
            $table->string("event_location");
            $table->string("event_date");
            $table->string("event_city");
            $table->string("event_poster");
            $table->string("event_description");
            $table->string("event_tag");
            $table->string("event_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};