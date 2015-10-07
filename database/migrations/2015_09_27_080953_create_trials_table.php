<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trials', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('experiment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('locked')->default(true);
            $table->boolean('revealed')->default(false);
            $table->boolean('complete')->default(false);
            $table->string('stage')->default('start');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('experiment_id')
                ->references('id')
                ->on('experiments')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('trials');
    }
}
