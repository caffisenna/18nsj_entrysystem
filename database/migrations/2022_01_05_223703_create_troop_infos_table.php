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
            $table->string('person_in_charge_name')->nullable();
            $table->string('person_in_charge_position');
            $table->string('person_in_charge_bsid');
            $table->string('person_in_charge_phone')->nullable();
            $table->string('person_in_charge_cellphone')->nullable();
            $table->string('person_in_charge_email')->nullable();
            $table->string('patrol1')->nullable();
            $table->string('patrol2')->nullable();
            $table->string('patrol3')->nullable();
            $table->string('patrol4')->nullable();
            $table->string('patrol5')->nullable();
            $table->string('patrol6')->nullable();
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
