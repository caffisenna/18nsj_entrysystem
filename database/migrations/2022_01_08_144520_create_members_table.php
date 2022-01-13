<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('role');
            $table->integer('patrol_code')->nullable();
            $table->string('patrol_role')->nullable();
            $table->string('bs_id');
            $table->string('name');
            $table->string('furigana');
            $table->string('grade')->nullable();
            $table->string('gender');
            $table->date('birthday');
            $table->string('religion');
            $table->string('religion_sect');
            $table->string('email');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('org_dan_name');
            $table->integer('org_dan_number');
            $table->string('org_group');
            $table->string('org_patrol')->nullable();
            $table->string('org_role')->nullable();
            $table->string('training_record')->nullable();
            $table->string('uuid')->nullable();
            $table->string('sfh')->nullable();
            $table->string('health_check')->nullable();
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
        Schema::drop('members');
    }
}
