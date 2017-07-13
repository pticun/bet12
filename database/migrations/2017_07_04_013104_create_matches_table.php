<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** 
        *Create "Match" table
        * argument 1 is table name
        * argument 2 is function has atribute for table
        */ 
        Schema::create('matches',function(Blueprint $table){
            $table->increments('id');
            $table -> string('home_team');
            $table -> string('away_team');
            $table -> double('home_rate');
            $table -> double('draw_rate');
            $table -> double('away_rate');
            $table -> dateTime('start_at');
            $table -> dateTime('end_at');
            $table -> dateTime('close_at');
            $table -> boolean('public');
            $table -> integer('home_score')->nullable();
            $table -> integer('away_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
