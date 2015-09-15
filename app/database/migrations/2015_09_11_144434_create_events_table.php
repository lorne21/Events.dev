<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			
			$table->string('title', 255);
			$table->text('description');
			$table->integer('price');
			$table->date('date');
			$table->time('start_time');
			$table->time('end_time')->nullable();
			$table->string('location', 255);
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('img')->nullable();
 
			$table->softDeletes();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
