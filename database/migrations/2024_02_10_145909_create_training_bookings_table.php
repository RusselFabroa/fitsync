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
        Schema::create('training_bookings', function (Blueprint $table) {
            $table->id('tb_id');
            $table->integer('user_id');
            $table->integer('trainings_id')->nullable();
            $table->string('booking_mop')->nullable();
            $table->string('booking_payment')->nullable();
            $table->string('booking_payment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_bookings');
    }
};