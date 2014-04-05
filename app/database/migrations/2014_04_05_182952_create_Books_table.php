<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Books', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('book_library_id')->unsigned();
			$table->foreign('book_library_id')->references('id')->on('BookLibraries')->onDelete('cascade');
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
		Schema::drop('Books');
	}

}
