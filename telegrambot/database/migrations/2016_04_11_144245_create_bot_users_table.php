<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telegram_id')->unique();
            $table->string('user_name');
            $table->string('first_name');
            $table->string('second_name'); 
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
        Schema::drop('bots_users');
    }
}
