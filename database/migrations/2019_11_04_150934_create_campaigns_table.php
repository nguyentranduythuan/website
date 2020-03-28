<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('member_id')->nullable()->default(0)->comment('Người tạo');
            $table->string('campaign_name', 255)->nullable()->comment('Tên Campaign');
            $table->dateTime('start_run')->comment('Thời gian bắt đầu chạy');
            $table->dateTime('end_run')->comment('Thời gian kết thúc');
            $table->integer('budget_limit')->default(0)->comment('Số tiền giới hạn');
            $table->integer('amount_used')->default(0)->comment('Số tiền đã sử dụng');
            $table->integer('price_sms')->default(0)->comment('Giá SMS khách deal với mình');
            $table->integer('price_call')->default(0)->comment('Giá Call khách deal với mình');

            $table->text('note')->nullable()->comment('Ghi chú lại Campaign');
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
        Schema::dropIfExists('campaigns');
    }
}
