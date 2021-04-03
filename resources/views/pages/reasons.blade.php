@extends('adminlte::page')

@section('title', 'Motivos de visita')

@section('content_header')
<h1>Modulo de motivos de visita</h1>
@stop

@section('content')
<div class="card border">
    <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-title"><i class="fas fa-list"></i> Motivos registrados</h5>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_reason_modal">
                        <i class="fas fa-plus"></i> Nuevo motivo
                    </a>
                </div>
            </div>
    </div>
    <div class="card-body">
        @csrf
        <table id="reasons_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Serie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reasons as $reason)
                    <tr id="{{$reason->id}}">
                        <td>{{$reason->name}}</td>
                        <td>{{$reason->serie}}</td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</div>
@include('pages.reasons_modal')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#reasons_table').dataTable( {
            "order": [ 1, "asc" ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });
</script>
@stop
