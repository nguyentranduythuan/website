<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTopUpMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_top_up_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable()->default(0)->comment('Người Nạp');
            $table->double('monery', 15, 2)->default(0)->comment('Số tiền nạp vào');
            $table->string('type', 255)->nullable()->comment('Hình thức nạp tiền');
            $table->tinyInteger('status')->nullable()->default(0)->comment("0:Pending, 1:Done");
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
        Schema::dropIfExists('data_top_up_members');
    }
}
