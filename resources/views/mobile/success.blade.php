@extends('layouts.mobile')

@section('content')
<div class="card" style="width: 18rem;">
    <img class="img-fluid" src="{{asset('img/default.jpg')}}" alt="logo">
    <div class="card-body text-center">
        <h5 class="card-title">Bienvenido</h5>
        <p class="card-text">Su turno es </p>
        <h1><span class="badge rounded-pill text-dark" style="background-color: #06afac; font-size: 110%;">{{ $ticket->ticket }}</span></h1>
    </div>
</div>
@stop