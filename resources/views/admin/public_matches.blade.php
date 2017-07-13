@extends('layouts.admin')

@section('content')
	<h3>All Public Matches<h3>
    @if( session('success') )
      <div class="alert alert-success">
       {!! session('success') !!}
      </div>
    @endif
    @if( session('fail') )
      <div class="alert alert-danger">
       {!! session('fail') !!}
      </div>
    @endif
	<table class="table table-bordered">
        <thead>
          <tr>
            <th>Home</th>
            <th>Away</th>
            <th>Start at</th>
            <th>End at</th>
            <th>Close Bet at</th>
            <th>Home Rate</th>
            <th>Draw Rate</th>
            <th>Away Rate</th>
            <th>Detail</th>
            <th>Delete</th>
            <th>Update Score</th>
          </tr>
        </thead>
        <tbody>
        @if( count($public_matches) )
          @foreach($public_matches as $public_match)
                <tr>
                    <td>{{ $public_match -> home_team }}</td>
                    <td>{{ $public_match -> away_team }}</td>
                    <td>{{ $public_match -> start_at }}</td>
                    <td>{{ $public_match -> end_at }}</td>
                    <td>{{ $public_match -> close_at }}</td>
                    <td>{{ $public_match -> home_rate }}</td>
                    <td>{{ $public_match -> draw_rate }}</td>
                    <td>{{ $public_match -> away_rate }}</td>
                    <td><a href="/admin/matches/public/{{$public_match->id}}/detail"><button>Detail</button></a></td>
                    <td><a href="/admin/matches/public/{{$public_match->id}}/delete"><button>Delete</button></a></td>
                    @if( $public_match->home_score && $public_match->away_score )
                        <td><strong>{{ $public_match->home_score.' : '.$public_match->away_score }}</strong></td>
                    @elseif( $public_match->end_at > date('Y-m-d H:i:s') )
                      <td><strong>Waiting</strong></td>
                    @else
                        <td><a href="/admin/matches/public/{{$public_match->id}}/updatescore"><button>Update Score</button></a></td>
                    @endif
                </tr>
          @endforeach
          @endif
        </tbody>
      </table>
@stop