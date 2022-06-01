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
            $table->string('how_to_join_bkup')->nullable(); // 確定時のbkup
            $table->string('join_days')->nullable();
            $table->string('join_days_bkup')->nullable(); // 確定時のbkup
            $table->string('camp_area')->nullable();
            $table->string('camp_area_bkup')->nullable(); // 確定時のbkup
            $table->string('job_department')->nullable();
            $table->string('job_department_bkup')->nullable(); // 確定時のbkup
            $table->text('memo')->nullable();
            $table->date('commi_ok')->nullable();
            $table->string('event_0807')->nullable();
            $table->string('event_0807_bkup')->nullable(); // 確定時のbkup
            $table->date('fee_checked_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('choice1_camp_area')->nullable(); // 奉仕場所未定の方
            $table->string('choice1_job_department')->nullable(); // 奉仕場所未定の方
            $table->string('choice2_camp_area')->nullable(); // 奉仕場所未定の方
            $table->string('choice2_job_department')->nullable(); // 奉仕場所未定の方
            $table->string('choice3_camp_area')->nullable(); // 奉仕場所未定の方
            $table->string('choice3_job_department')->nullable(); // 奉仕場所未定の方
            $table->date('edit_lock')->nullable(); // 確定後のロック
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
