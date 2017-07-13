@extends('layouts.admin')

@section('content')
    <div class="col-md-12 container">
    <form class="well form-horizontal" action="/admin/matches/create" method="POST" >
    {{ csrf_field() }}
    <fieldset>
    
    <!-- Form Name -->
    <legend><strong>Create a New Match</strong></legend>
    @if( session('success') )
      <div class="alert alert-success">
       {!! session('success') !!}
      </div>
    @endif

    @if(count($errors))

      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
      </div>

    @endif
    <!-- Text input-->
    <div class="form-group {{ $errors->has('home_team')? 'has-error': ''}}">
      <label class="col-md-2 control-label">Home Team</label>  
      <div class="col-md-4">
      <input  name="home_team" placeholder="Example: MU" class="form-control"  type="text" value="{{ old('home_team') }}">
      <span class="text-danger">{{ $errors->first('home_team') }}</span>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group {{ $errors->has('away_team')? 'has-error': ''}}">
      <label class="col-md-2 control-label" >Away Team</label> 
        <div class="col-md-4">
      <input name="away_team" placeholder="Exaple: MC" class="form-control"  type="text" value="{{ old('away_team') }}">
      <span class="text-danger">{{ $errors->first('away_team') }}</span>
      </div>
    </div>
    <!-- Text input-->

    <div class="form-group {{ $errors->has('start_at')? 'has-error': ''}}">
      <label class="col-md-2 control-label">Start At</label>  
      <div class="col-md-4" value="{{ old('start_at') }}">
      <input  name="start_at" placeholder="Example: 2017-07-05 17:00:00" class="form-control"  type="text" value="{{ old('start_at') }}">
      <span class="text-danger">{{ $errors->first('start_at') }}</span>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group {{ $errors->has('end_at')? 'has-error': ''}}">
      <label class="col-md-2 control-label" >End At</label> 
        <div class="col-md-4">
      <input name="end_at" placeholder="Exaple: 2017-07-05 19:00:00" class="form-control"  type="text" value= "{{ old('end_at') }}" >
      <span class="text-danger">{{ $errors->first('end_at') }}</span>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group {{ $errors->has('close_at')? 'has-error': ''}}">
      <label class="col-md-2 control-label" >Close Bet At</label> 
        <div class="col-md-4">
      <input name="close_at" placeholder="Exaple: 2017-07-04 15:00:00" class="form-control"  type="text" value="{{ old('close_at') }}">
      <span class="text-danger">{{ $errors->first('close_at') }}</span>
      </div>
    </div>

    <fieldset>
        <legend>Bet Rate</legend>
        <!-- Text input-->
        <div class="form-group {{ $errors->has('home_rate')? 'has-error': ''}}">
          <label class="col-md-2 control-label" >Home Rate</label> 
            <div class="col-md-4">
          <input name="home_rate" placeholder="Exaple: 0.9" class="form-control"  type="text" value="{{ old('home_rate') }}">
          <span class="text-danger">{{ $errors->first('home_rate') }}</span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group {{ $errors->has('draw_rate')? 'has-error': ''}}">
          <label class="col-md-2 control-label" >Draw Rate</label> 
            <div class="col-md-4">
          <input name="draw_rate" placeholder="Exaple: 0.9" class="form-control"  type="text" value="{{ old('draw_rate') }}">
          <span class="text-danger">{{ $errors->first('draw_rate') }}</span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group {{ $errors->has('away_rate')? 'has-error': ''}}">
          <label class="col-md-2 control-label" >Away Rate</label> 
            <div class="col-md-4">
          <input name="away_rate" placeholder="Exaple: 0.9" class="form-control"  type="text" value="{{ old('away_rate') }}">
          <span class="text-danger">{{ $errors->first('away_rate') }}</span>
          </div>
        </div>
    </fieldset>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
        <button type="submit" class="btn btn-warning" >Create</button>
      </div>
    </div>
</fieldset>
</form>
</div>
@stop