<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->string('phone');
			$table->string('address');
			$table->string('email');
			$table->integer('dep_user_id');
			$table->integer('dep_id');
			$table->datetime('open_date');
			$table->text('subject');
			$table->integer('periority');
			$table->string('color');
			$table->string('comment');
			$table->string('sloving');
			$table->integer('status');
			$table->datetime('closed_date');
			$table->text('file');
			$table->integer('cat_id');
			$table->integer('role_id');
		});
	}

	public function down()
	{
		Schema::drop('tickets');
	}
}