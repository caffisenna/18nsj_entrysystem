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
            $table->string('district_name')->nullable();
            $table->string('chairman_name')->nullable();
            $table->string('chairman_phone')->nullable();
            $table->string('chairman_email')->nullable();
            $table->string('commi_name')->nullable();
            $table->string('commi_phone')->nullable();
            $table->string('commi_email')->nullable();
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
