<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('home_first_ad');
            $table->string('home_second_ad');

            $table->string('home_number_banner');
            
            $table->double('home_first_number');
            $table->string('en_home_first_number_title');
            $table->string('ar_home_first_number_title');

            $table->double('home_second_number');
            $table->string('en_home_second_number_title');
            $table->string('ar_home_second_number_title');

            $table->double('home_third_number');
            $table->string('en_home_third_number_title');
            $table->string('ar_home_third_number_title');

            $table->double('home_fourth_number');
            $table->string('en_home_fourth_number_title');
            $table->string('ar_home_fourth_number_title');

            $table->string('home_advantage_first_icon');
            $table->string('en_home_advantage_first_title');
            $table->string('ar_home_advantage_first_title');
            $table->text('en_home_advantage_first_text');
            $table->text('ar_home_advantage_first_text');

            $table->string('home_advantage_second_icon');
            $table->string('en_home_advantage_second_title');
            $table->string('ar_home_advantage_second_title');
            $table->text('en_home_advantage_second_text');
            $table->text('ar_home_advantage_second_text');

            $table->string('home_advantage_third_icon');
            $table->string('en_home_advantage_third_title');
            $table->string('ar_home_advantage_third_title');
            $table->text('en_home_advantage_third_text');
            $table->text('ar_home_advantage_third_text');

            $table->string('home_advantage_fourth_icon');
            $table->string('en_home_advantage_fourth_title');
            $table->string('ar_home_advantage_fourth_title');
            $table->text('en_home_advantage_fourth_text');
            $table->text('ar_home_advantage_fourth_text');

            
            $table->string('en_footer_about_title');
            $table->string('ar_footer_about_title');
            $table->text('en_footer_about_text');
            $table->text('ar_footer_about_text');

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
        Schema::dropIfExists('mains');
    }
}
