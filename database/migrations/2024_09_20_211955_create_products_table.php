<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 8, 2);
        $table->integer('stock')->default(0);
        $table->string('image')->nullable();

        // Ensure this is 'unsignedBigInteger'
        $table->unsignedBigInteger('category_id');

        // Define the foreign key constraint
        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade');

        $table->text('long_description');
        $table->text('material');
        $table->text('dimensions');
        $table->text('weight');
        $table->timestamps();
    });

}


    public function down()
    {
        Schema::dropIfExists('products');
    }

};
