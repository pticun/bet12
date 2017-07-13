@extends('layouts.admin')

@section('content')
    <fieldset>
          <legend><strong>Delete Public Match </strong></legend>
          <h3>Are you sure delete match: {{ $public_match -> home_team.' VS '. $public_match->away_team}}</h3>
          <h3>Time: {{ $public_match->start_at.' to '.$public_match->end_at}}</h3><br>
          <form action="{{ route('delete_public_match',$public_match->id)}}" method="POST">
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