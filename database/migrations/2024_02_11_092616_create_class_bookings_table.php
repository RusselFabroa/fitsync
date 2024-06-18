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
        Schema::create('class_bookings', function (Blueprint $table) {
            $table->id('cb_id');
            $table->integer('user_id');
            $table->integer('class_id')->nullable();
            $table->string('booking_mop')->nullable();
            $table->string('booking_payment')->nullable();
            $table->string('booking_payment_date')->nullable();
            $table->string('booking_payment_status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_bookings');
    }
};
