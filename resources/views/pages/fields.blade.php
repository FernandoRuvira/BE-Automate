@extends('adminlte::page')

@section('title', 'Campos del dormulario')

@section('content_header')
<h1>Modulo de formulario</h1>
@stop

@section('content')
<div class="card border">
    <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-title"><i class="fas fa-list"></i> Campos registrados</h5>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_field_modal">
                        <i class="fas fa-plus"></i> Nuevo campo
                    </a>
                </div>
            </div>
    </div>
    <div class="card-body">
        @csrf
        <table id="fields_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre del campo</th>
                    <th>Tipo</th>
                    <th>Posición</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                    <tr id="{{$field->id}}">
                        <td>{{$field->name}}</td>
                        <td>{{$field->type}}</td>
                        <td>{{$field->position}}</td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</div>
@include('pages.fields_modal')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#fields_table').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });
</script>
@stop
