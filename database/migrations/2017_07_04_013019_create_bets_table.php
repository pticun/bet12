<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        * Create Bet table 
        * argument 1 is table name
        * argument 2 is function has artribute for table
        */
        Schema::create('bets',function(Blueprint $table){
            $table->increments('id');
            $table -> integer('user_id');
            $table -> integer('match_id');
            $table -> integer('place_bet');
            $table -> integer('betting_money');
            $table -> dateTime('bet_at');
            $table -> string('status')->nullable();
            $table -> integer('profit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Shema::dropIfExists('bets');
    }
}
