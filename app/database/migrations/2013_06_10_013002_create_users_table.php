<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('users', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->string('email', 40);
            $table->string('password', 128);
            $table->string('name', 10);
            $table->integer('num_questions', false, true);
            $table->integer('num_replies', false, true);
            $table->integer('num_comments', false, true);
            $table->integer('num_fans', false, true);
            $table->integer('num_follow', false, true);
            $table->integer('num_favourites', false, true);
            $table->timestamp('last_time');
            $table->integer('last_ip', false, true);
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
		Schema::drop('users');
	}

}