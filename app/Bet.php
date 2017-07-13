<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    //
    const HOME_WIN = '0';
    const DRAW = '1';
    const AWAY_WIN = '2';
    protected $table = 'bets';
    public $timestamps = false;
    protected $fillable = array('user_id','match_id','place_bet','betting_money','bet_at','status','profit');
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function match()
    {
        return $this->belongsTo('App\Match');
    }
}
