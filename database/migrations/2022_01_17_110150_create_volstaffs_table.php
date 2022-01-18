<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolstaffsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volstaffs', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('bs_id');
            $table->string('furigana');
            $table->string('gender');
            $table->date('birthday');
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('org_district')->nullable();
            $table->string('org_dan_name');
            $table->string('org_dan_number');
            $table->string('org_group');
            $table->string('org_role');
            $table->string('district_role')->nullable();
            $table->string('training_record')->nullable();
            $table->string('uuid')->nullable();
            $table->string('sfh')->nullable();
            $table->string('health_check')->nullable();
            $table->string('car_number')->nullable();
            $table->string('car_type')->nullable();
            $table->string('how_to_join')->nullable();
            $table->string('join_days')->nullable();
            $table->string('camp_area');
            $table->string('job_department')->nullable();
            $table->text('memo')->nullable();
            $table->date('commi_ok')->nullable();
            $table->string('event_0807')->nullable();
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
        Schema::drop('volstaffs');
    }
}
