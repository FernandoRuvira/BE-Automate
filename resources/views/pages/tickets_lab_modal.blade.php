<!-- Add Lab Modal -->
<div class="modal fade" id="tickets_lab_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_lab_title">Estadisticas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="labId">
                    <div class="row">
                        <div class="col-2"></div>
                        <label for="dateI" class="col-form-label">Fecha inicial</label>
                        <div class="col-2">
                            <input class="form-control" type="date" value="{{$dateI}}" id="dateI" name="dateI">
                        </div>   
                        <label for="dateF" class="col-form-label">Fecha final</label>
                        <div class="col-2">
                            <input class="form-control" type="date" value="{{$dateF}}" id="dateF" name="dateF">
                        </div>
                        <div class="col-1">
                            <button id="filter" type="submit" class="btn btn-primary">Filtrar</button>
                        </div>    
                    </div>
                <div class="card-body">
                    <div id="ticketsByLab" style="margin-left:100px; width: 500px; height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
function deleteSucursal(route, id) {
        if(confirm('¿Esta seguro de eliminar esta sucursal?')) {
            var token = $('input[name="_token"]').val();

            $.ajax({
                url: route,
                method: "POST",
                data:{_token:token, id:id },
                success: function(result) {
                    $('#test').submit();
                }
            })
        }
}

 function editSucursal(route, id) {
        var token = $('input[name="_token"]').val();
        console.log(token);
        $.ajax({
            url: route,
            method: "POST",
            data:{_token:token, id:id },
            success: function(result) {
                var data = JSON.parse(result);
                //alert(result);
                       
                 
                $.each(data, function(index, value) {
                    
                    if(value["id"]!=undefined)
                    {
                        $('#IDED').empty();
                        $('#IDED').append('<input type="text" name="IDE" id="IDE" value="'+value["id"]+'" style="visibility: hidden">');
                    }
                  if(value["name"]!=undefined)
                    {
                        $('#labelNE').empty();
                        $('#labelNE').append('<input type="text" class="form-control" name="nameInputE" id="nameInputE" value="'+value["name"]+'" placeholder="Ingrese el nombre de la sucursal">');
                    }
                    if(value["city"]!=undefined)
                    {  
                        $('#cityIE').empty();
                        $('#cityIE').append('<input type="text" class="form-control" name="cityInputE" id="cityInputE" value="'+value["city"]+'" placeholder="Ingrese la ciudad donde se encuentra la sucursal">');
                    }
                    if(value["address"]!=undefined)
                    {  
                        $('#adressIE').empty();
                        $('#adressIE').append('<input type="text" class="form-control" name="addressInputE" id="addressInputE" value="'+value["address"]+'" placeholder="Ingrese la dirección de la sucursal">');
                    }
                    if(value["day"]=="Lun")
                    {  
                        $('#LunIE').empty();
                        $('#LunCIE').empty();
                        $('#LunCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Monday" checked="true" >');
                        $('#LunIE').append('<input type="text" class="form-control" name="monday" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" id="mondayE">');
                    }
                    if(value["day"]=="Mar")
                    {  
                        $('#MarIE').empty();
                         $('#MarCIE').empty();
                        $('#MarCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Tuesday" checked="true" >');
                        $('#MarIE').append('<input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" name="tuesday" id="tuesdayE">');
                    }
                    if(value["day"]=="Mie")
                    {  
                        $('#MieIE').empty();
                        $('#MieCIE').empty();
                        $('#MieCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Wednesday" checked="true" >');
                        $('#MieIE').append('<input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" name="wednesday" id="wednesdayE">');
                    }
                    if(value["day"]=="Jue")
                    {    
                        $('#JueIE').empty();
                        $('#JueCIE').empty();
                        $('#JueCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Thursday" checked="true" >');
                        $('#JueIE').append(' <input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" name="thursday" id="thursdayE">');
                    }
                     if(value["day"]=="Vie")
                    {  
                        $('#VieIE').empty();
                        $('#VieCIE').empty();
                        $('#VieCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Friday" checked="true" >');
                        $('#VieIE').append(' <input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM"  placeholder="HH:MM AM - HH:MM PM" name="friday" id="fridayE">');
                    }
                    if(value["day"]=="Sab")
                    {   
                        $('#SabIE').empty();
                        $('#SabCIE').empty();
                        $('#SabCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Saturday" checked="true" >');
                        $('#SabIE').append(' <input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" name="saturday" id="saturdayE">');
                    }
                    if(value["day"]=="Dom")
                    {  
                        $('#DomIE').empty();
                        $('#DomCIE').empty();
                        $('#DomCIE').append('<input  class="form-check-input" type="checkbox" name="days[]" value="Sunday" checked="true" >');
                        $('#DomIE').append('<input type="text" class="form-control float-right" value="'+value["opening"].substring(0,5)+" AM - "+value["closing"].substring(0,5)+' PM" placeholder="HH:MM AM - HH:MM PM" name="sunday" id="sundayE">');
                    }
                });
            }
        })
    }   
    function getTickets(lab){
        var dateI = $('#dateI').val();
        var dateF = $('#dateF').val();
        var token = $('input[name="_token"]').val();
        $("#labId").val( lab );

        $.ajax({
            url: "getTicketsByLab",
            method: "POST",
            data: {_token:token, lab:lab, dateI:dateI, dateF:dateF},
            success: function(res){

                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data1 = google.visualization.arrayToDataTable(res);

                    var options1 = {
                    title: 'Tickets',
                    pieHole: 0.4,
                    };

                    var chart1 = new google.visualization.PieChart(document.getElementById('ticketsByLab'));

                    chart1.draw(data1, options1);
                }
            }
        })
    }

    $( "#filter" ).click(function() {
        var lab = $("#labId").val();
        getTickets(lab);
    });
</script>
@stop
