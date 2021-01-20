<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('en_slug');
            $table->string('ar_slug');
            $table->text('en_text');
            $table->text('ar_text');
            $table->string('image');
            $table->double('price_before_discount', 2);
            $table->double('price_after_discount', 2)->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('hot_deal')->default(0);
            $table->boolean('status')->default(1);
            $table->bigInteger('category_id')->unsigned();
            $table->string('banner_image');
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
        Schema::dropIfExists('products');
    }
}
