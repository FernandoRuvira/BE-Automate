@extends('adminlte::page')

@section('title', 'tes')

@section('content_header')
<h1>Reporte de Tickets</h1>
@stop

@section('content')
<div class="card border">
    <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-title"><i class="fas fa-ticket-alt"></i> Tickets atendidos</h5>
                </div>
                <!--<div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_t_modal">
                        <i class="fas fa-user-plus"></i> Nuevo
                    </a>
                </div>-->            
            </div>
        <form role="form" class="form" method="POST" action="{{url('tickets/search')}}">
        @csrf
            <div class="row">
                <div class="col-5"></div>
                <label for="dateI" class="col-form-label">Fecha inicial</label>
                <div class="col-2">
                    <input class="form-control" type="date" value="{{$dateI}}" id="dateI" name="dateI">
                </div>   
                <label for="dateF" class="col-form-label">Fecha final</label>
                <div class="col-2">
                    <input class="form-control" type="date" value="{{$dateF}}" id="dateF" name="dateF">
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>    
            </div>
        </form>
    </div>
    <div class="card-body">
        @csrf
        <table id="tickets_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Sucursal</th>
                    <th># de tickets</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $t)
                    <tr>
                        <td>{{$t->name}}</td>
                        <td>{{$t->cant_tickets}}</td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tickets_table').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });
</script>
@stop
