<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Bet;
use DB;

class BetController extends Controller
{
    //Show Bet Match for Guest
    public function showBet()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','>',date('Y-m-d H:i:s'))
    					->get();
    	return view('guest.bet')->with('matches',$matches);
    }

    //Show Match has Close Bet but has not score
    public function closeBet()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','<',date('Y-m-d H:i:s'))
    					->whereNull('home_score')
    					->whereNull('away_score')
    					->get();
  		return view('guest.closed_bet')->with('matches',$matches);
    }

    //Show Match have score and closed bet
    public function completedMatch()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','<',date('Y-m-d H:i:s'))
    					->whereNotNull('home_score')
    					->whereNotNull('away_score')
    					->get();
    	return view('guest.completed')->with('matches',$matches);
    }

    //Show Detail Match for Guest
    public function showDetailMatch($id)
    {
    	$match = Match::findOrFail($id);
    	$home_win = DB::table('matches')->where('matches.id','=',$id)
    									->where('place_bet','=',Bet::HOME_WIN)
    									->join('bets','matches.id','=','bets.match_id')
    									->count();
    	$draw = DB::table('matches')->where('matches.id','=',$id)
    									->where('place_bet','=',Bet::DRAW)
    									->join('bets','matches.id','=','bets.match_id')
    									->count();
    	$away_win = DB::table('matches')->where('matches.id','=',$id)
    									->where('place_bet','=',Bet::AWAY_WIN)
    									->join('bets','matches.id','=','bets.match_id')
    									->count();
    	return view('guest.show_match',['match' => $match,'home_win'=>$home_win, 'draw'=>$draw, 'away_win'=>$away_win]);
    }

}
