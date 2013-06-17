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
            $table->string('avatar', 128)->default('');
            $table->integer('num_questions', false, true)->default(0);
            $table->integer('num_replies', false, true)->default(0);
            $table->integer('num_comments', false, true)->default(0);
            $table->integer('num_fans', false, true)->default(0);
            $table->integer('num_follow', false, true)->default(0);
            $table->integer('num_favourites', false, true)->default(0);
            $table->timestamp('last_time');
            $table->integer('last_ip', false, true)->default(0);
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