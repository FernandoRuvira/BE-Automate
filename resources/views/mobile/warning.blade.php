@extends('layouts.mobile')

@section('content')
<div class="card text-center">
    <img class="img-fluid" src="{{asset('img/default.jpg')}}" alt="logo" style="max-width: 50%; display:block; margin:auto;">
    <div class="card-body">
        <h5 class="card-title">Estimado cliente</h5>
        <p class="card-text">Ya cuenta con el turno en espera </p>
        <h1><span class="badge rounded-pill text-dark" style="background-color: #e24191; font-size: 110%;">{{ $ticket->ticket }}</span></h1>
    </div>
</div>
@stop