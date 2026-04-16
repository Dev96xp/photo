<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('type')->default('GENERAL');   // PORTRAIT, WEDDING, FAMILY, COMMERCIAL, etc.
            $table->string('location')->nullable();
            $table->string('status')->default('SCHEDULED'); // SCHEDULED, COMPLETED, CANCELLED
            $table->text('note')->nullable();
            $table->integer('sort_order')->default(1);    // 1, 2, 3 para ordenar dentro del proyecto

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_sessions');
    }
};
