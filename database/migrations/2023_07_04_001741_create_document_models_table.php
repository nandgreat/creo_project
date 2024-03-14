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
        Schema::create('document_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id');
            $table->text('name');
            $table->text('path');
            $table->text('url');
            $table->text('type');
            $table->text('size');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_models');
    }
};
