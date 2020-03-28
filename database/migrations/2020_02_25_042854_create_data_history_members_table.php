<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataHistoryMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_history_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable()->default(0)->comment('Người Nạp');
            $table->double('monery', 15, 2)->default(0)->comment('Số tiền sử dụng');
            $table->string('content', 255)->nullable()->comment('Nội dung chi');
            $table->integer('type')->nullable()->default(0)->comment('0:SMS, 1:Check Phone');
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
        Schema::dropIfExists('data_history_members');
    }
}
