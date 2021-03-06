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
            $table->string('religion')->nullable();
            $table->string('religion_sect')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('org_dan_name');
            $table->integer('org_dan_number');
            $table->string('org_group');
            $table->string('org_patrol')->nullable();
            $table->string('org_role')->nullable();
            $table->string('training_record')->nullable();
            $table->string('uuid')->nullable()->unique();
            $table->string('sfh')->nullable();
            $table->string('health_check')->nullable();
            $table->string('how_to_join')->nullable();
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
