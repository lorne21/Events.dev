<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			
			$table->string('band_name', 255);
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string('genre', 255)->nullable();
			$table->string('img')->nullable();
			$table->text('about')->nullable();

			
			$table->rememberToken(); 
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
		Schema::drop('users');
	}

}
