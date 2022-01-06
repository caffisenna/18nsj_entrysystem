<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dan_codes', function (Blueprint $table) {
            $table->id();
            $table->string('pref_name');
            $table->string('district_name');
            $table->string('dan_name');
            $table->integer('pref_code');
            $table->integer('district_code');
            $table->integer('dan_name_code');
            $table->integer('dan_code');

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
        Schema::dropIfExists('dan_codes');
    }
}
