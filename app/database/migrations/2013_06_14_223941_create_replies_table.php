<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('replies', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('question_id', false, true);
            $table->string('content', 2048);
            $table->integer('num_comments', false, true);
            $table->integer('num_votes', false, true);
            $table->integer('num_hates', false, true);
            $table->integer('status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('replies');
	}

}