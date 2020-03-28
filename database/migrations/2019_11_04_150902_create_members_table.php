<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('fullname', 255)->nullable()->comment('Full name');
            $table->string('address', 255)->nullable()->comment('Address');
            $table->string('phone', 128)->nullable()->comment('Phone');
            $table->string('email', 255)->nullable()->comment('Email');
            $table->string('password', 255)->nullable()->default("")->comment('Password');
            
            $table->double('total_money', 15, 2)->default(0)->comment('Tổng số tiền người dùng nạp');
            $table->integer('total_campaign')->default(0)->comment('Tổng cộng số Campaign mà user này tạo');
            $table->double('left_money', 15, 2)->default(0)->comment('Số tiền còn lại');

            $table->string('ip_last_login', 128)->nullable()->comment('IP Last login');
            $table->dateTime('time_last_login')->nullable()->comment('Time Last login');
            
            $table->tinyInteger('is_active')->nullable()->default(0)->comment("0:Hide, 1:Show");
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
        Schema::dropIfExists('members');
    }
}
