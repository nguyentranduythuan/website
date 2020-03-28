<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->nullable()->comment('Code');
            $table->string('name', 255)->nullable()->comment('Name');
            $table->integer('district_id')->unsigned();
            $table->integer('order_by')->nullable()->default(0)->comment('Order by');
            $table->text('tags');
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->index('district_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wards');
    }
}
