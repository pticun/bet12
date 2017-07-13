@extends('layouts.guest')

@section('active_tab')
			<li>
            	<a href="/">Bet</a>
            </li>
            <li>
            	<a href="/closedbet">Closed Bet</a>
            </li>
            <li class="active">
            	<a href="/completed">Completed</a>
            </li>
@stop

@section('content')
	<div class="tab-pane" id="3">
		<table class="table table-bordered">

		  <thead>
		    <tr>
		      <th colspan="3" class="text-center">Match Completed</th>
		    </tr>
		  </thead>
		 
		  <tbody>
		  @foreach( $matches as $match )
		    <tr>
		      <td colspan="3" class="text-center">{{ $match->start_at.'--- '.$match->home_team.' vs '.$match->away_team.' --- '.$match->home_score.' : '.$match->away_score }}>><a href="{{ route('show_detail_match',$match->id) }}">Detail</a></td>
		    </tr>
		    <tr>
		      <td>{{ $match->home_team }} Win - Rate {{ $match->home_rate }}</td>
		      <td>Draw - Rate {{ $match->draw_rate}} </td>
		      <td>{{ $match->away_team }} Win - Rate {{ $match->away_rate}}</td>
		    </tr>
		    @endforeach
		  </tbody>

		</table>  
     </div>
@stop