@extends('adminlte::page')

@section('title', 'Lista de espera')

@section('content_header')
<h1>Lista de espera</h1>
@stop

@section('content')


@foreach ($queues as $queue)
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> {{$queue['reason']->name}}</h3>
                <div class="card-tools">
                    <a href="{{url('next/'.$queue['reason']->id)}}" class="btn btn-sm btn-outline-primary"><i class="far fa-hand-point-right"></i> Siguiente</a>
                    <span title="{{$queue['count']}} en fila" class="badge bg-primary">{{$queue['count']}}</span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @foreach ($queue['tickets'] as $ticket)
                    <div class="col-md-3">
                        <div class="callout callout-{{$ticket->status == 'S' ? 'warning' : 'info'}}">
                            <h5>{{$ticket->ticket}}</h5>
                            <p>Celular: {{$ticket->phone}}</p>
                            <p>Registro: {{date('H:i', strtotime($ticket->created_at))}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop

@section('js')

@stop
