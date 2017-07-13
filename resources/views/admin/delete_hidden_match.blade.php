@extends('layouts.admin')

@section('content')
    <fieldset>
          <legend><strong>Delete Hidden Match </strong></legend>
          <h3>Are you sure delete match: {{ $hidden_match -> home_team.' VS '. $hidden_match->away_team}}</h3>
          <h3>Time: {{ $hidden_match->start_at.' to '.$hidden_match->end_at}}</h3><br>
          <form action="{{ route('delete_hidden_match',$hidden_match->id)}}" method="POST">
          {{ csrf_field() }}
          <label class="custom-control custom-radio">
            <input id="radio1" name="delete" type="radio" class="custom-control-input" value="yes">
            <span class="custom-control-description">Yes</span>
          </label><br>
          <label class="custom-control custom-radio">
            <input id="radio2" name="delete" type="radio" class="custom-control-input " checked="checked" value="no">
            <span class="custom-control-description">No</span>
          </label><br><br>
          <div class="col-md-2">
            <button type="submit" class="btn btn-warning" >Delete</span></button>
          </div>
          </form>
    </fieldset>
@stop