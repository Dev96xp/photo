<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('session_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('status')->default('ACTIVE'); // ACTIVE, VIEW, HIDE
            $table->text('note')->nullable();

            $table->unsignedBigInteger('photo_session_id');
            $table->foreign('photo_session_id')->references('id')->on('photo_sessions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_galleries');
    }
};
