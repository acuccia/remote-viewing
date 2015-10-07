<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetTrialPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_trial', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('target_id')->unsigned()->index();
            $table->foreign('target_id')->references('id')->on('targets')->onDelete('cascade');
            $table->integer('trial_id')->unsigned()->index();
            $table->foreign('trial_id')->references('id')->on('trials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('target_trial');
    }
}
