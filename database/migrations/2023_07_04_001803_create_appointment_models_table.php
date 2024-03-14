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
        Schema::create('appointment_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status');
            $table->text('description');
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedBigInteger('initiator_id');
            $table->unsignedBigInteger('target_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_models');
    }
};
