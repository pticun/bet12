@extends('layouts.app')

@section('main')
<div id='content' class='row-fluid'>
<div class='col-md-2 sidebar'>
    <ul class="nav nav-tabs nav-stacked">
      <li><a href="/admin/matches/create">Create New Match</a></li>
      <li><a href="/admin/matches">View Hidden Match</a></li>
      <li><a href="/admin/matches/public">View Public Match</a></li>
    </ul>
  </div>
  <div class='col-sm-10 main'>
  @yield('content')
    </div>
</div>
@stop
