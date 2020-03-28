<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source_name', 255)->nullable()->comment('Name');
            $table->text('note')->nullable()->comment('Ghi chú lại source');
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
        Schema::dropIfExists('source_data');
    }
}
