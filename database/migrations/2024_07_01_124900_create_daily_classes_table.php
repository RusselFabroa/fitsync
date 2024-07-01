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
        Schema::create('daily_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');//foreign key
            $table->string('class_day');
            $table->time('class_start_time');
            $table->time('class_end_time');
            $table->integer('attendess_limit');
            $table->integer('current_attendees');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_classes');
    }
};
