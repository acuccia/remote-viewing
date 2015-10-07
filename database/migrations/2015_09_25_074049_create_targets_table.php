<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->integer('experiment_id')->unsigned();
            $table->string('coordinates');
            $table->boolean('is_decoy')->default(true);
            $table->timestamps();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('experiment_id')
                ->references('id')
                ->on('experiments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('targets');
    }
}
