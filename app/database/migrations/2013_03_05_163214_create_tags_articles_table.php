<?php

use Illuminate\Database\Migrations\Migration;

class CreateTagsArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags_articles', function($table)
		{
			$table->integer('tag_id')->unsigned();
			$table->integer('article_id')->unsigned();
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
		Schema::drop('tags_articles');
	}

}