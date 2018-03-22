<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCountryOfOrigin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Remove unused field, country of origin.
        Schema::table('artwork', function (Blueprint $table) {
            $table->dropColumn('country_of_origin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Add the country of origin field back in.
        Schema::table('artwork', function (Blueprint $table) {
            $table->string('country_of_origin');
        });
    }
}
