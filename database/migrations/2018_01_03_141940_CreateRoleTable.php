<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('roles', function(Blueprint $table)
  		{
        $table->increments('id');
        //CreatedBy/UpdatedBy
        $table->timestamps();
        //Will reference the user field.
        #$table->integer('user_id')->unsigned();
        //Use foreign key to reference the User table.
        #$table->foreign('user_id')->references('id')->on('users')
        #->onDelete('cascade');
        $table->string('name');
        $table->string('description');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop roles table.
        Schema::dropIfExists('roles');
    }
}
