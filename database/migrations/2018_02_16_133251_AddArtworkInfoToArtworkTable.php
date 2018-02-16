<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArtworkInfoToArtworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artwork', function (Blueprint $table) {
            $table->string('artist_name')->nullable();
            // $table->string('image_type')->nullable();
            $table->string('grad_year')->nullable();
            $table->text('inspiration')->nullable();
            $table->string('profession')->nullable();
            $table->string('still_creating')->nullable();
            $table->string('favorite_artist')->nullable();
            $table->text('contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artwork', function (Blueprint $table) {
            $table->dropColumn('artist_name');
            // $table->dropColumn('image_type');
            $table->dropColumn('grad_year');
            $table->dropColumn('inspiration');
            $table->dropColumn('profession');
            $table->dropColumn('still_creating');
            $table->dropColumn('favorite_artist');
            $table->dropColumn('contact');
        });
    }
}
