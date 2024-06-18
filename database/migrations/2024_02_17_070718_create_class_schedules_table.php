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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id('class_id');
            $table->integer('user_id');
            $table->string('class_title')->nullable();
            $table->string('class_description')->nullable();
            $table->string('class_start_date')->nullable();
            $table->string('class_end_date')->nullable();
            $table->string('class_start_time')->nullable();
            $table->string('class_end_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
