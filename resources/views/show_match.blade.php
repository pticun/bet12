@extends('layouts.guest')

@section('active_tab')
            <li>
                <a href="" data-toggle="tab">Bet</a>
            </li>
            <li>
                <a href="#2" data-toggle="tab">Closed Bet</a>
            </li>
            <li>
                <a href="#3" data-toggle="tab">Completed</a>
            </li>
@stop

@section('content')
        <table class="table">        
          <tbody>
          <!--  foreach -->
            <tr>
              <td>Match: MU vs MC</td>
            </tr>
            <tr>
              <td>Time start: </td>
            </tr>
            <tr>
                <td>Time end: </td>
            </tr>
            <tr>
                <td>Close bet at: </td>
            </tr>
            <!-- endforeach -->
          </tbody>

        </table>

        <table class="table table-bordered">
            <thead>
                <th colspan="3" class="text-center">Bet Rate and Number of bets</th>
            </thead>         
          <tbody>
          <!--  foreach -->
            <tr>
              <td>MU win - Rate:</td>
              <td>Draw - Rate: </td>
              <td>MU win - Rate: </td>
            </tr>
            <tr>
              <td>40 bets</td>
              <td>12 bets</td>
              <td>12 bets</td>
            </tr>
            <!-- endforeach -->
          </tbody>

        </table>
@stop