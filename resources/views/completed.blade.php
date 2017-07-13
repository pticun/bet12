@extends('layouts.guest')

@section('active_tab')
			<li>
            	<a href="" data-toggle="tab">Bet</a>
            </li>
            <li>
            	<a href="#2" data-toggle="tab">Closed Bet</a>
            </li>
            <li  class="active">
            	<a href="#3" data-toggle="tab">Completed</a>
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
		  <!--  foreach -->
		    <tr>
		      <td colspan="3" class="text-center">11h MU vs MC >><a href="#">Detail</a></td>
		    </tr>
		    <tr>
		      <td> Win</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <!-- endforeach -->
		  </tbody>

		</table>  
     </div>
@stop