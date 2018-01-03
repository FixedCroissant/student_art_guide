<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artwork', function(Blueprint $table)
		{
			$table->increments('id');
			//CreatedBy/UpdatedBy
			$table->timestamps();
			$table->string('nameOfArtPiece');
			$table->string('country_of_origin');
			$table->string('submittedBy')->nullable();
			//Additional Information
			$table->text('additionalInformation')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artwork');
	}

}
