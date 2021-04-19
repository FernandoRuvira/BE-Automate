@extends('layouts.mobile')

@section('content')
<div class="card text-center">
    <img class="img-fluid" src="{{asset('img/default.jpg')}}" alt="logo" style="max-width: 50%; display:block; margin:auto;">
    <div class="card-body">
        <h5 class="card-title">Bienvenido</h5>
        <p class="card-text">Su turno es </p>
        <h1><span class="badge rounded-pill text-dark" style="background-color: #06afac; font-size: 110%;">{{ $ticket->ticket }}</span></h1>
    </div>
</div>
@stop