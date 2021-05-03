@extends('layouts.mobile')

@section('content')
<div class="card text-center">
    <img class="img-fluid" src="{{asset('img/default.jpg')}}" alt="logo" style="max-width: 50%; display:block; margin:auto;">
    <div class="card-body">
        <h5 class="card-title">Bienvenido</h5>
        <p class="card-text">Su número de ticket es </p>
        <h1><span class="badge rounded-pill text-dark" style="background-color: #06afac; font-size: 110%;">{{ $ticket->ticket }}</span></h1>
        <p>Hay <strong>{{ $ticket->positionInLine() - 1 }}</strong> personas antes que usted en la fila de <strong>{{ $ticket->reason->name }}</strong>.</p>
        <p>El tiempo aproximado de espera por cada ticket es de </p>
        <h3>{{ $ticket->averageWaitingTime() }} minutos</h3>
        <p>Recibirá un mensaje cuando sea su turno.</p>
    </div>
</div>
@stop