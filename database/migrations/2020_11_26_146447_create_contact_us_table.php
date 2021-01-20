<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_email_1');
            $table->string('sales_email_2');
            $table->string('sales_email_3')->nullable();
            $table->string('phone');
            $table->string('fax');
            $table->string('en_location');
            $table->string('ar_location');
            $table->text('en_address');
            $table->text('ar_address');
            $table->string('en_work_days');
            $table->string('ar_work_days');
            $table->string('en_work_hours');
            $table->string('ar_work_hours');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
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
        Schema::dropIfExists('contact_us');
    }
}
