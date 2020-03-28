<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname', 255)->nullable()->comment('Full name');
            $table->string('address', 255)->nullable()->comment('Address');
            $table->string('phone', 128)->nullable()->comment('Phone');
            $table->string('email', 255)->nullable()->comment('Email');
            $table->date('dob')->nullable()->comment('DOB');
            $table->integer('gender')->nullable()->default(0)->comment('Gender: 1:Male, 0:Female');
            $table->string('id_no', 128)->nullable();
            $table->integer('source_id')->nullable()->default(0)->comment('Nguồn tạo từ đâu');
            $table->integer('province_id')->nullable()->default(0)->comment('Province ID');
            $table->integer('district_id')->nullable()->default(0)->comment('District ID');
            $table->integer('ward_id')->nullable()->default(0)->comment('Ward ID');
            $table->integer('street_id')->nullable()->default(0)->comment('Street ID');
            $table->dateTime('last_send_sms')->comment('Last send SMS');
            $table->string('sim_send_sms', 128)->nullable()->comment('SIM Number send SMS');
            $table->string('content_send_sms', 255)->nullable()->comment('Content send SMS');
            $table->text('log_send_sms')->nullable()->comment('Json log send sms');
            $table->dateTime('last_update_info')->comment('Last Time People Update Info');
            $table->string('ip_update_info', 128)->nullable()->comment('IP address People Update Info');
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
        Schema::dropIfExists('data_people');
    }
}
