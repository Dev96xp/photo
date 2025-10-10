<?php

use App\Models\Image;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('order_position')->default(0);
            $table->string('url');
            $table->string('model')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->text('description1')->nullable();
            $table->text('note')->nullable();
            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
            $table->text('note3')->nullable();
            $table->text('color')->nullable();
            $table->text('color1')->nullable();
            $table->text('color2')->nullable();
            $table->enum('status', [Image::INACTIVE, Image::ACTIVE, Image::PENDING])->default(Image::INACTIVE);
            // tabla polimorfica
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
