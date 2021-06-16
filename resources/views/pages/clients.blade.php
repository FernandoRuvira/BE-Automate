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
                <!--<div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_client_modal">
                        <i class="fas fa-user-plus"></i> Nuevo
                    </a>
                </div>-->            
            </div>
    </div>
    <div class="card-body">
        @csrf
        <table id="clients_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Celular</th>
                    <th class="text-center">Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr id="{{$client->id}}">
                        <td>{{$client->id}}</td>
                        <td>{{$client->phone}}</td>
                        <td align="center">
                            <a href="#" data-toggle="modal" data-target="#info_modal" onclick="getInfo('{{$client->id}}');">
                                <i class="fas fa-info-circle"></i>
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

    function getInfo(ticket){
        var token = $('input[name="_token"]').val();

        $.ajax({
            url: "clients/info",
            method: "POST",
            data: {_token:token, ticket:ticket},
            success: function(res){
                var data = JSON.parse(res);

                $('#contenedor').empty();
                $.each(data, function(index, value) {
                    $('#contenedor').append('<div class="row"><div class="col-4"></div><label class="col-form-label">'+value["name"]+':</label><div class="col-2"><input class="form-control" type="text" style="border: 0;" value="'+value["info"]+'"></div></div><br>');
                });
            }
        })
    }
</script>
@stop
