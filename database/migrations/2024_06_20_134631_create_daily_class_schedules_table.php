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
        Schema::create('daily_class_schedules', function (Blueprint $table) {
            $table->id('class_id');
            $table->integer('user_id');
            $table->string('class_title')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('class_description')->nullable();
            $table->string('class_trainor')->nullable();

            $table->string('class_date')->nullable();
            $table->string('class_start_time')->nullable();
            $table->string('class_end_time')->nullable();
            $table->integer('class_limit')->nullable();
            $table->integer('class_attendees')->nullable();
            $table->string('class_type')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_class_schedules');
    }
};
