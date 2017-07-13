<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Bet;
use DB;
use Auth;
use App\User;
use Validator;

class UserController extends Controller
{
    //Show Bet Match for Guest
    public function showBet()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','>',date('Y-m-d H:i:s'))
    					->get();
    	return view('user.bet')->with('matches',$matches);
    }

    //Show Match has Close Bet but has not score
    public function closeBet()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','<',date('Y-m-d H:i:s'))
    					->whereNull('home_score')
    					->whereNull('away_score')
    					->get();
  		return view('user.closed_bet')->with('matches',$matches);
    }

    //Show Match have score and closed bet
    public function completedMatch()
    {
    	$matches = Match::where('public','1')
    					->where('close_at','<',date('Y-m-d H:i:s'))
    					->whereNotNull('home_score')
    					->whereNotNull('away_score')
    					->get();
    	return view('user.completed')->with('matches',$matches);
    }

    //show form to bet a match
    public function betMatchForm($id)
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
    	return view('user.bet_a_match',['match' => $match,'home_win'=>$home_win, 'draw'=>$draw, 'away_win'=>$away_win]);
    }

    //show 
    public function show($id)
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

    //Bet
    public function betMatch(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $total_money = $user->total_money;
        $validate = Validator::make($request->all(),[
                'betting_money' => 'required|numeric|max:'.$total_money,
            ]);
        if( $validate -> fails() )
        {
            return redirect()->route('bet_a_match',$id)
                             ->withErrors($validate)
                             ->withInput();
        }else{
            // decrease total_money for User 
            $user->total_money = $total_money - $request->betting_money;
            $user -> save();
            //Create a new Bet 
            $bet = new Bet;
            $bet->user_id = $user_id;
            $bet->match_id = $id;
            $bet->place_bet = $request->place_bet;
            $bet->betting_money = $request->betting_money;
            $bet->bet_at = date('Y-m-d H:i:s');
            $bet->save();
            //Redirecting with flashed session data
            return redirect()->route('bet_a_match1',$id)->with('success',"You has been placed {$bet->betting_money} APC for")->with('place_bet',$bet->place_bet);
        } 
    }

    //show history
    public function history()
    {
        $user_id = Auth::user()->id;
        $current_money = Auth::user()->total_money;
        //Retrieving match
        $matches = DB::table('bets')->join('users','bets.user_id','=','users.id')
                                  ->join('matches','bets.match_id','=','matches.id')
                                  ->where('users.id',$user_id)
                                  ->get();
        return view('user.history')->with('matches',$matches)->with('current_money',$current_money);
    }
}
