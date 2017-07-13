@extends('layouts.admin')

@section('content')
    <h3>All Hidden Matches</h3>
              @if( session('success') )
            <div class="alert alert-success">
             {!! session('success') !!}
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
            <th>Edit</th>
            <th>Delete</th>
            <th>Public</th>
          </tr>
        </thead>
        <tbody>
        @if( count($hidden_matches) )
          @foreach($hidden_matches as $hidden_match)
                <tr>
                    <td>{{ $hidden_match -> home_team }}</td>
                    <td>{{ $hidden_match -> away_team }}</td>
                    <td>{{ $hidden_match -> start_at }}</td>
                    <td>{{ $hidden_match -> end_at }}</td>
                    <td>{{ $hidden_match -> close_at }}</td>
                    <td>{{ $hidden_match -> home_rate }}</td>
                    <td>{{ $hidden_match -> draw_rate }}</td>
                    <td>{{ $hidden_match -> away_rate }}</td>

                    <td><a href="/admin/matches/{{$hidden_match->id}}/edit"><button>Edit</button></a></td>
                    <td><a href="/admin/matches/{{$hidden_match->id}}/delete"><button>Delete</button></a></td>
                    <td><a href="/admin/matches/{{$hidden_match->id}}/public"><button>Public</button></a></td>
                </tr>
          @endforeach
          @endif
        </tbody>
      </table>
@stop