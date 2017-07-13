@extends('layouts.app')

@section('main')

<div class="container"><h2></h2></div>

<div class="container"> 
        <ul class="nav nav-pills">
            @yield('active_tab')
        </ul>
        <div class='col-sm-10 main'>
            @yield('content')
        </div>
  </div>
  @stop