<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroopInfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troop_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('pref');
            $table->string('district');
            $table->string('troop_number')->nullable();
            $table->string('person_in_charge_name');
            $table->string('person_in_charge_position');
            $table->string('person_in_charge_bsid');
            $table->string('person_in_charge_phone');
            $table->string('person_in_charge_cellphone');
            $table->string('person_in_charge_email');
            $table->string('patrol1');
            $table->string('patrol2');
            $table->string('patrol3');
            $table->string('patrol4');
            $table->string('patrol5');
            $table->string('patrol6');
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
        Schema::drop('troop_infos');
    }
}
