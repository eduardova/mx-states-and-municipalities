<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMxMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mx_municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('mx_state_id')->index();
            $table->integer('number');
            $table->timestamps();

            $table->foreign('mx_state_id')
            ->references('id')->on('mx_states')
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
        Schema::dropIfExists('mx_municipalities');
    }
}
