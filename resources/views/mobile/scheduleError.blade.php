@extends('layouts.mobile')

@section('content')
<div class="card text-center">
    <img class="img-fluid" src="{{asset('img/default.jpg')}}" alt="logo" style="max-width: 50%; display:block; margin:auto;">
    <div class="card-body">
        <h5 class="card-title">Estimado cliente</h5>
        <p class="card-text">El horario de su cita no entra dentro del horario de la sucursal. </p>
        <p>Sucursal: {{$lab->name}} <br>
            Apertura: {{ $lab->opening }}
            Cierre: {{ $lab->closing }}
        </p>
    </div>
</div>
@stop