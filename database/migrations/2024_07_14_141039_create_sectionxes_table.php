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
        Schema::create('sectionxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('note')->nullable();
            $table->text('description')->nullable();
            $table->text('status');

            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectionxes');
    }
};
