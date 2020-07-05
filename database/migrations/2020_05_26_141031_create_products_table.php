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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('featured_image')->nullable(); 
            $table->integer('price')->nullable(); 
            $table->integer('sale_price')->nullable();       
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('status')->nullable()->default(true);
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
