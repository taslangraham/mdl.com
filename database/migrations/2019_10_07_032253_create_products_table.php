<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id',2333);
            $table->string('name', 256);
            $table-> string('description', 256);
            $table->integer('price_per_unit');
            $table->integer('added_by');
            $table->string('weight', 256);
            $table->string('image_name', 256);
            $table->string('image_path', 256);
            $table->double('quantity');
            $table->timestamps();
           $table->foreign('added_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
