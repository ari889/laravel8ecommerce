<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttrubuteValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attrubute_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_attribute_id')->unsigned()->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');
            $table->string('value');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attrubute_values');
    }
}
