@extends('guest.show_match')

@section('active_tab')
    <li>
              <a href="/user" >Bet</a>
        </li>
        <li>
          <a href="/user/closedbet">Closed Bet</a>
        </li>
        <li>
          <a href="/user/completed">Completed</a>
        </li>
        <li>
            <a href="/user/history">History</a>
    </li>
@stop

@section('content')
    @parent
    @if( session('success') )
      <div class="alert alert-success">
       {!! session('success') !!}
       @if( session('place_bet') == '0' )
       {{ $match->home_team }} Win
       @elseif( session('place_bet') == '1' )
            Draw
       @else
        {{ $match->away_team }} Win
       @endif
      </div>
    @endif
    <!-- Show form to bet when now < time close bet -->
    @if( $match->close_at > date('Y-m-d H:i:s') )
    <form action="{{ route('bet_a_match1',$match->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <p><b>Choose your place bet:</b></p><br>
                <p><b>Fill money to bet:</b></p> 
            </div>
        </div>
        <div class="col-md-2">
                <select name="place_bet" class="selectpicker">
                      <option  value="0">{{ $match -> home_team}} Win</option>
                      <option value="1">Draw</option>
                      <option  value="2">{{ $match->away_team }} Win</option>
                </select>
                <br><br>
                <input type="number" min="0" name="betting_money" placeholder="Example: 500">
                <span class="text-danger">{{ $errors->first('betting_money') }}</span>
        </div>     
    </div>
    <div class="col-md-2 col-md-offset-6">
        <button type="submit" class="btn btn-warning" >Bet</button>
    </div>
    </form>
    @endif
@stop
