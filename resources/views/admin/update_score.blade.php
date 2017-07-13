@extends('layouts.admin')

@section('content')
    <fieldset>
        <legend><strong>Update Score</strong></legend>
        <h3>Match: <strong>{{ $public_match->home_team.' VS '.$public_match->away_team}}</strong></h3><br>
        <h3>Time: {{ $public_match->start_at.' to '.$public_match->end_at}}
        </h3><br>
        <form action="{{ route('update_score',$public_match->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <div class="form-group">
                    <label for="home_score">{{ $public_match->home_team }}</label>
                    <input type="number" id="home_score" name="home_score" class="form-control" min="0" >
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <p>VS</p>
                    <p><strong>:</strong></p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="away_score">{{ $public_match->away_team }}</label>
                    <input type="number" id="away_score" name="away_score" class="form-control" min="0">
                </div>
            </div>
        </div><br>
        <div class="col-md-2 col-md-offset-4">
            <button type="submit" class="btn btn-warning" >Update Score</span></button>
          </div>
        </form>
    </fieldset>
@stop