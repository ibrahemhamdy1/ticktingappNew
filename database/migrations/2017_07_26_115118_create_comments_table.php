<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('body');
			$table->integer('tour_id');
			$table->integer('user_id');
			$table->integer('parent_id');
			$table->integer('news_id');
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}