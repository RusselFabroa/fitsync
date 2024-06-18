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
        Schema::create('bmis', function (Blueprint $table) {
            $table->id('bmi_id');
            $table->integer('user_id');
            $table->string('bmi_height')->nullable();
            $table->string('bmi_weight')->nullable();
            $table->string('bmi_result')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmis');
    }
};