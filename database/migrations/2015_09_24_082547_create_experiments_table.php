<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        // pivot table for decoys
        Schema::create('decoys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experiment_id');
            $table->integer('location_id');
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
        Schema::drop('decoys');
        Schema::drop('experiments');
    }
}
