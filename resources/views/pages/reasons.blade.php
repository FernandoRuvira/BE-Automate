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
        <form id="test" class="form" method="GET" action="{{ url('reasons') }}">
        </form>
        @csrf
        <table id="reasons_table" class="table table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="display:none;">ID</th>
                    <th>Nombre</th>
                    <th>Serie</th>
                    <th>Eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($reasons as $reason)
                    <tr>
                        <td style="display:none;">{{$reason->id}}</td>

                        <td>{{$reason->name}}</td>
                        <td>{{$reason->serie}}</td>
                       
                              <td align="center">
                                  <a href="#" onclick="deleteReason('{{ url('reason/delete') }}', '{{$reason->id}}');">
                                      <i class="fas fa-trash-alt"></i>
                                  </a>
                              </td>
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


    function deleteReason(route, id) {

       //alert(route);
        if(confirm('¿Esta seguro de eliminar esta Razón?')) {
            var token = $('input[name="_token"]').val();

            $.ajax({
                url: route,
                method: "POST",
                data:{_token:token, id:id },
                success: function(result) {
                    //alert(result);
                    $('#test').submit();
                }
            })
        }
    }
</script>
@stop
