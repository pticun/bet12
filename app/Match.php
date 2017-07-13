<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //Mapping with matches Table in DB
    protected $table = 'matches';
    public $timestamps = false;
    // arrtribute fillable
    protected $fillable = array(
				    	'home_team',
				    	'away_team',
				    	'home_rate',
				    	'draw_rate',
				    	'away_team',
				    	'start_at',
				    	'end_at',
				    	'close_at',
				    	'public',
				    	'home_score',
				    	'away_score'
				    	);
    // One Match has Many Bet
    public function bets()
    {
    	return $this->hasMany('App\Bet');
    }

}
