@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1>Modulo de clientes</h1>
@stop

@section('content')
<div class="card border">
    <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-title"><i class="fas fa-user-tie"></i> Clientes registrados</h5>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_client_modal">
                        <i class="fas fa-user-plus"></i> Nuevo
                    </a>
                </div>
            </div>
    </div>
    <div class="card-body">
        @csrf
        <table id="clients_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Procesos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr id="{{$client->id}}">
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td align="center">
                            <a href="#" data-toggle="modal" data-target="#process_modal"
                                onclick="getProcesses('{{ url('clients/processes') }}', '{{$client->id}}');">
                                <i class="fas fa-cogs"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</div>
@include('pages.clients_modal')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#clients_table').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });

    function getProcesses(route, client)
    {
        $('#processes_rows').remove();
        $('#processes_table').append('<tbody id="processes_rows"></tbody>');
        var token = $('input[name="_token"]').val();

        $.ajax({
            url: route,
            method: "POST",
            data:{_token:token, client:client},
            success: function(result) {
                var data = JSON.parse(result);
                $.each(data, function(index, value) {
                    $('#processes_rows').append('<tr><td>' + value.id + '</td><td>' + value.name + '</td></tr>');
                });
                $('#processes_table').dataTable({
                    destroy: true,
                    "order": [[ 1, "desc" ]],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }
                });
            }
        })
    }
</script>
@stop
