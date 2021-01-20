<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('en_branch_location');
            $table->string('ar_branch_location');
            $table->string('en_branch_city');
            $table->string('ar_branch_city');
            $table->string('en_branch_address');
            $table->string('ar_branch_address');
            $table->string('branch_phone_1');
            $table->string('branch_phone_2')->nullable();
            $table->string('branch_phone_3')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('branches');
    }
}
