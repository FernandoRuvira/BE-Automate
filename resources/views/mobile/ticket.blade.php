@extends('layouts.mobile')

@section('content')
<br>
<div class="row">
    <div class="text-center">
        <img class="img-fluid" src="{{asset('img/logo_small.png')}}" alt="logo">
    </div>
</div>
<br>

<div class="card border">
    <div class="card-header">
        <h6 class="card-title">Solicitar ticket - Sucursal {{$lab->name}}</h6>
    </div>
    <div class="card-body">
        <form role="form" class="form" method="POST" action="{{url('tickets/save')}}">

            @csrf

            <input type="hidden" name="lab" value="{{$lab->id}}">

            <div class="form-group">
                <label for="phoneInput">Celular</label>
                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" id="phoneInput" value="{{old('phone')}}" maxlength="10" placeholder="Ingrese su numero de celular">
            </div>

            <div class="form-group">
                <label for="reasonInput">Motivo de su visita</label>
                <select class="form-select" name="reason" id="reasonInput" placeholder="Seleccione el motivo de su visita">
                    @foreach ($reasons as $reason)
                        <option value="{{$reason->id}}">{{$reason->name}}</option>
                    @endforeach
                </select>
            </div>

            @foreach ($fields as $field)
                <div class="form-group">
                    <label for="{{strtolower($field->name)}}Input">{{$field->name}}</label>
                    <input type="{{strcmp($field->type, 'T') == 0 ? 'text' : 'number'}}" class="form-control" name="{{strtolower($field->name)}}" placeholder="Ingrese su {{strtolower($field->name)}}">
                </div>
            @endforeach

            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkAccept" onclick="acceptTerms()">
                <label class="form-check-label" for="checkAccept">
                    {{$terms}}
                </label>
            </div>

            <br>
            <button type="submit" id="submitButton" class="btn btn-primary" disabled>Registrar</button>
        </form>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
function acceptTerms() {
    var checkBox = document.getElementById("checkAccept");
    var button = document.getElementById("submitButton");

    if (checkBox.checked == true)
    {
        button.disabled = false;
    }
    else
    {
        button.disabled = true;
    }
}

function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function()
        {
            if (inputFilter(this.value))
            {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            }
            else if (this.hasOwnProperty("oldValue"))
            {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else
            {
                this.value = "";
            }
        });
    });
}

setInputFilter(document.getElementById("phoneInput"), function(value) {
    return /^-?\d*$/.test(value);
});
</script>
@stop
