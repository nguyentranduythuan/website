<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCampaignSMSAPISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_campaign_s_m_s_a_p_i_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable()->default(0)->comment('Người tạo');
            $table->integer('campaign_id')->nullable()->default(0)->comment('Thuộc Campaign nào');
            $table->string('phone', 128)->nullable()->comment('Phone');
            $table->string('content_sms', 255)->nullable()->comment('Nội dung gửi đi');
            $table->string('carrier', 128)->nullable()->default("")->comment('Nhà mạng');
            $table->tinyInteger('status')->nullable()->default(0)->comment("0:Waiting, 1:Done, 2: Error");
            $table->dateTime('time_send')->comment('Thời gian gửi');
            $table->string('phone_to', 128)->nullable()->comment('Điện thoại gửi');
            $table->string('sms_return', 255)->nullable()->comment('Nội dung SMS gửi trả lại nếu có');
          
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
        Schema::dropIfExists('data_campaign_s_m_s_a_p_i_s');
    }
}
