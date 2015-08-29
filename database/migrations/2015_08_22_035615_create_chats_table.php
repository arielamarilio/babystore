<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from_user_id')->unsigned()->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('to_user_id')->unsigned()->nullable();
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('from_ip', 15);
            $table->text('message');

            $table->tinyInteger('read');

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
        Schema::drop('chats');
    }
}
