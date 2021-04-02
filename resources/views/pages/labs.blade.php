@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
<h1>Catálogo de sucursales</h1>
@stop

@section('content')
<div class="card border">
    <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-title"><i class="fas fa-flask"></i> Sucursales registradas</h5>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_lab_modal">
                        <i class="fas fa-plus"></i> Nueva sucursal
                    </a>
                </div>
            </div>
    </div>
    <div class="card-body">

        <div class="container-fluid">

            @foreach ($labs as $lab)

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Sucursal {{$lab->name}}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="row">
                                <div class="col-12 text-center">
                                @if($lab->image)
                                    <img class="img-fluid pad" src="{{asset('img/labs').'/'.$lab->image}}" alt="image">
                                @else
                                    <img class="img-fluid pad" src="{{asset('img/default.jpg')}}" alt="image">
                                @endif
                                </div>
                            </div> <br> <br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="https://quickchart.io/qr?text={{url('labs')}}&size=800&margin=4">
                                        <img src="https://quickchart.io/qr?text={{url('labs')}}&size=150&margin=1">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="row">
                                <div class="info-box">
                                    <span class="info-box-icon"><i class="fas fa-map-marked-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ciudad</span>
                                        <span class="info-box-number">{{$lab->city}}</span>
                                        <span class="info-box-text">Drección</span>
                                        <span class="info-box-number">{{$lab->address}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="info-box">
                                    <span class="info-box-icon"><i class="fas fa-calendar-alt"></i></span>
                                    <div class="info-box-content">
                                        @foreach ($lab->schedule as $schedule)
                                        <span class="info-box-text">{{$schedule->day}}</span>
                                        <span class="info-box-number">{{substr($schedule->opening,0,5).' - '.substr($schedule->closing,0,5)}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-2 text-center">
                            <a class="btn btn-app">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a class="btn btn-app">
                                <span class="badge bg-teal">67</span>
                                <i class="fas fa-inbox"></i> Tickets
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-footer">

                </div>

            </div>

            @endforeach

        </div>
    </div>
</div>

@include('pages.labs_modal')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop

@section('js')

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">

@if (count($errors) > 0)
    $('#add_lab_modal').modal('show');
@endif

$('#monday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#tuesday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#wednesday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#thursday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#friday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#saturday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

$('#sunday').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

</script>
@stop
