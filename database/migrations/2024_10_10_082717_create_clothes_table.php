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
        Schema::create('clothes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('brand');
        $table->string('model');
        $table->text('description');
        $table->decimal('price', 8, 2);
        $table->integer('stock')->default(0);
        $table->string('image')->nullable();
        $table->text('long_description');
        $table->text('material');
        $table->text('dimensions');
        $table->text('weight');
        $table->integer('warranty_period')->nullable(); // in months
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes');
    }
};
