@extends('adminlte::page')

@section('title', 'Lista de espera')

@section('content_header')
<h1>Lista de espera</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ol"></i> Análisis clínicos</h3>
            </div>

            <div class="card-body">
                <div class="callout callout-success">
                <h5>Ticket A001</h5>
            </div>

            <div class="callout callout-info">
                <h5>Ticket A002</h5>
            </div>

        </div>
    </div>
</div>

@stop

@section('js')

@stop
