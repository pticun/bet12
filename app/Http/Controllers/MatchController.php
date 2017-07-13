<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Illuminate\Support\Facades\Validator;


class MatchController extends Controller
{
    //Show All Hidden Match
    public function show()
    {
    	//Retrive all object
    	$hidden_matches = Match::where('public','0')->orderBy('id','desc')->get();
    	return view('admin.hidden_matches')->with('hidden_matches',$hidden_matches);
    }

    //Edit a match by id
    public function editForm($id)
    {
        $hidden_match = Match::findOrFail($id);
        return view('admin.edit_hidden_match')->with('hidden_match',$hidden_match);
    }

    //Update to database
    public function editMatch(Request $request, $id)
    { 
        $validate = Validator::make($request->all(),[
            'home_team' => 'required|max:255',
            'away_team' => 'required|max:255|different:home_team',
            'start_at' => 'required|before:end_at',
            'end_at' => 'required|after:start_at',
            'close_at' => 'required|before:start_at|after:'.date('Y-m-d H:i:s'),
            'home_rate' => 'required',
            'draw_rate' => 'required',
            'away_rate' => 'required',
            ],
            [
                'close_at.after' => 'the Bet at field must be after now',
                'close_at.before' => 'the Bet At field must be before Start At',
                'end_at.after' => ' the End At field must be after Start At',
                'start_at.before' => 'the Start At field must be before End At Field',
            ]);
        if( $validate -> fails() )
        {
            return redirect()->route('edit_hidden_match',$id)
                             ->withErrors($validate)
                             ->withInput();
        }else{
            $hidden_match = Match::find($id);
            $hidden_match -> home_team = $request -> home_team;
            $hidden_match -> away_team = $request -> away_team;
            $hidden_match -> start_at = $request -> start_at;
            $hidden_match -> end_at = $request -> end_at;
            $hidden_match -> close_at = $request -> close_at;
            $hidden_match -> home_rate = $request -> home_rate;
            $hidden_match -> draw_rate = $request -> draw_rate;
            $hidden_match -> away_rate = $request -> away_rate;
            $hidden_match -> public = 0;
            $hidden_match -> save();
            //Redirecting with flashed session data
            return redirect()->route('edit_hidden_match',$id)
                            ->with('success','The match update successfull');

        }

    }
    //Show Confirm to delete
    public function delete($id)
    {
    	$hidden_match = Match::findOrFail($id);
        return view('admin.delete_hidden_match')->with('hidden_match',$hidden_match);
    }

    //Delete Match in DB
    public function deleteMatch(Request $request, $id)
    {
        if( $request->delete == 'yes'){
            $hidden_match = Match::findOrFail($id);
            $hidden_match->delete();
            return redirect()->route('view_hidden_matches')->with('success',"the match <b> {$hidden_match->home_team} vs {$hidden_match->away_team}</b> delete successfull");
        }else
        {
            return redirect()->route('view_hidden_matches');
        }
    }

    //Public a Match by id
    public function publicMatch($id)
    {
    	$hidden_match = Match::find($id);
        $hidden_match->public = 1;
        $hidden_match->save();
        return redirect()->route('view_hidden_matches')->with('success',"The match <b>{$hidden_match->home_team} VS {$hidden_match->away_team}</b> is public");
    }

    //Show Form to Create a new match
    public function createForm()
    {
    	return view('admin.create_new_match');
    }

    //Create new Object
    public function createMatch(Request $request)
    {
    	$validate = Validator::make($request->all(),[
    		'home_team' => 'required|max:255',
    		'away_team' => 'required|max:255|different:home_team',
    		'start_at' => 'required|before:end_at',
    		'end_at' => 'required|after:start_at',
    		'close_at' => 'required|before:start_at|after:'.date('Y-m-d H:i:s'),
    		'home_rate' => 'required',
    		'draw_rate' => 'required',
    		'away_rate' => 'required',
    		],
    		[
    			'close_at.after' => 'the Bet at field must be after now',
    			'close_at.before' => 'the Bet At field must be before Start At',
    			'end_at.after' => ' the End At field must be after Start At',
                'start_at.before' => 'the Start At field must be before End At Field',
    		]);
    	if( $validate -> fails() )
    	{
	    	return redirect()->route('create_hidden_match')
	    					 ->withErrors($validate)
	    					 ->withInput();
    	}else{
    		$match = new Match;
	    	$match->home_team = $request ->home_team;
	    	$match->away_team = $request ->away_team;
	    	$match->start_at = $request ->start_at;
	    	$match->end_at = $request ->end_at;
	    	$match->close_at = $request ->close_at;
	    	$match->home_rate = $request ->home_rate;
	    	$match->draw_rate = $request ->draw_rate;
	    	$match->away_rate = $request ->away_rate;
	    	$match->public = 0;
	    	$match -> save();
            //Redirecting with flashed session data
	    	return redirect()->route('create_hidden_match')
                            ->with('success','The match create successfull');
    	}
    }
    /**
    *Public Match
    */
    //show Public Match
    public function showPublicMatch()
    {
        $public_matches = Match::where('public','1')->orderBy('id','DESC')->get();
        return view('admin.public_matches')->with('public_matches',$public_matches);
    }

    //Detail Match
    public function detailPublicMatch($id)
    {
        $public_match = Match::findOrFail($id);
        return view('admin.detail_match')->with('public_match',$public_match);
    }

    //Delete Public Match Form
    public function deletePublicMatchForm($id)
    {
        $public_match = Match::findOrFail($id);
        if( $public_match->bets->count() )
        {
            return redirect()->route('view_public_matches')->with('fail',"The match <strong>{$public_match->home_team} vs {$public_match->away_team}</strong> cannot be delete becase it has at least one bet");           
        }else{
            return view('admin.delete_public_match')->with('public_match',$public_match);
        }    
    }

    public function deletePublicMatch(Request $request,$id)
    {
        $public_match = Match::findOrFail($id);
        $public_match->delete();
        return redirect()->route('view_public_matches')->with('success',"the match <strong>{$public_match->home_team} vs {$public_match->away_team}</strong> deleted successfull");
    }

    //Show Update Score Form
    public function updateScoreForm($id)
    {
        $public_match = Match::findOrFail($id);
        return view('admin.update_score')->with('public_match',$public_match);
    }

    //Update Score in DataBase
    public function updateScore(Request $request,$id)
    {
        //1. Save to matches table
        $public_match = Match::findOrFail($id);
        $public_match->home_score = $request->home_score;
        $public_match->away_score = $request->away_score;
        $public_match->save();
        //2. Update for all users
        if($public_match->home_score > $public_match->away_score)
        {
            $result =  0;   //Home win
        }elseif ($public_match->home_score == $public_match->away_score) {
            $result = 1;   //Draw
        }else{
            $result = 2;   //Away win
        }
        //get rate
        if( $result == 0)
        {
            $rate = $public_match->home_rate;
        }elseif( $result == 1)
        {
            $rate = $public_match->draw_rate;
        }else{
            $rate = $public_match->away_rate;
        }

        foreach ($public_match->bets as $bet) 
        {
            //User Win
            if($bet->place_bet == $result)
            {
                $bet->status = 'Win';
                $bet->profit = 0 + ($bet->betting_money * $rate);
                $bet->save();
                $user = $bet->user;
                $user->total_money += $bet->betting_money + $bet->profit;
                $user->save();
            }else //User Lose
            {
                $bet->status = 'Lose';
                $bet->profit = 0 - $bet->betting_money;
                $bet->save();
            }
        }

        return redirect()->route('view_public_matches')->with('success',"The match <strong>{$public_match->home_team} vs {$public_match->away_team}</strong> has been update score");
    }
    /**
        *check result Home win, Draw or Away win
        * @return 0-Home win, 1- Draw, 2-Away win
    */
    public function result($home_score,$away_score)
    {
        
    }

}
