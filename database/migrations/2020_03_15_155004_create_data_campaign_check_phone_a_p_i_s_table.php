<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCampaignCheckPhoneAPISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_campaign_check_phone_a_p_i_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable()->default(0)->comment('Người tạo');
            $table->integer('campaign_id')->nullable()->default(0)->comment('Thuộc Campaign nào');
            $table->string('phone', 128)->nullable()->comment('Phone');
            $table->string('carrier', 128)->nullable()->default("")->comment('Nhà mạng');
            $table->string('status', 128)->nullable()->comment("Theo server");
            $table->dateTime('time_call')->comment('Thời gian call');
            
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
        Schema::dropIfExists('data_campaign_check_phone_a_p_i_s');
    }
}
