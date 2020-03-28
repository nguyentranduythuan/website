<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 128)->nullable();
            $table->integer('group_id')->default(0);
            $table->string('password',255)->default("");
            $table->string('fullname', 128)->default("");
            $table->text('permissions');
            $table->integer('is_active')->default(0);
            $table->integer('group_lawyer')->default(0);
            $table->integer('supper_lawyer')->default(0);
            $table->integer('count_du_an')->default(0);
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
        Schema::dropIfExists('admin_users');
    }
}
