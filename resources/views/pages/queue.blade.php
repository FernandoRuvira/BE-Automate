@extends('adminlte::page')

@section('title', 'Lista de espera')

@section('content_header')
<h1>Lista de espera</h1>
@stop

@section('content')

<div class="row">
    @foreach ($queues as $queue)
    <div class="col-md-2">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ol"></i> {{$queue['reason']->name}}</h3>
            </div>

            <div class="card-body">
                @foreach ($queue['tickets'] as $ticket)
                <div class="callout callout-success">
                    <h6>Ticket {{$ticket->ticket}}</h6>
                    <p>Telefono: {{$ticket->phone}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop

@section('js')

@stop
