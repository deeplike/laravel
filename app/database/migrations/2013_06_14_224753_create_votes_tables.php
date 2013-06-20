<?php

use Illuminate\Database\Migrations\Migration;

class CreateVotesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('votes', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('reply_id', false, true);
            $table->enum('vote', array(-1, 0 , 1))->default(0);
            $table->integer('status', false, true)->default(0);
            $table->timestamps();
            $table->unique(array('user_id', 'reply_id'));
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}

}