<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPICampaignCheckPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_i_campaign_check_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable()->default(0)->comment('Người tạo');
            $table->integer('campaign_id')->nullable()->default(0)->comment('Thuộc Campaign nào');
            $table->string('app_key', 128)->nullable()->comment('APP_KEY');
            $table->string('app_scret', 255)->nullable()->comment('APP_SECRET');
            $table->tinyInteger('status')->nullable()->default(0)->comment("0:STOP, 1:RUNNING");
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
        Schema::dropIfExists('a_p_i_campaign_check_phones');
    }
}
