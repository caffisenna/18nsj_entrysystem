<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictExecsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_execs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district_name');
            $table->string('chairman_name');
            $table->string('chairman_phone');
            $table->string('chairman_email');
            $table->string('commi_name');
            $table->string('commi_phone');
            $table->string('commi_email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('district_execs');
    }
}
