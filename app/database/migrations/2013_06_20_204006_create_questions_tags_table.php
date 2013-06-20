<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('questions_tags', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('question_id', false, true);
            $table->integer('tag_id', false, true);
            $table->integer('status', false, true)->default(0);
            $table->timestamps();
            $table->unique(array('question_id', 'tag_id'));
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::drop('questions_tags');
	}

}
