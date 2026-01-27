<?php

use App\Models\Expense;
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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('note')->nullable();
            $table->float('cost')->default(0);
            $table->float('cost2')->default(0);
            $table->string('sign')->default('none');
            $table->float('discount')->default(0);;
            $table->enum('status', [Expense::ACTIVO, Expense::CANCELADO, Expense::REVISION])->default(Expense::ACTIVO);

            $table->string('type')->default('none');
            $table->string('aux')->default('none');
            $table->string('aux2')->default('none');
            $table->integer('executive_id')->nullable();

            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
