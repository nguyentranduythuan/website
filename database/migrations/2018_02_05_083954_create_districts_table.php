<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->nullable()->comment('Code');
            $table->string('name', 255)->nullable()->comment('Name');
            $table->integer('province_id')->unsigned();
            $table->integer('order_by')->nullable()->default(0)->comment('Order by');
            $table->text('tags');
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->index('province_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
