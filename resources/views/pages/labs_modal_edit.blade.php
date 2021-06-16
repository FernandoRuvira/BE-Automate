<!-- Add Lab Modal -->
<div class="modal fade" id="add_lab_modal_edit" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_lab_title">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="{{url('labs/update')}}">

                    @csrf
                    <div id="IDED" style="visibility: hidden">
                    </div>
                    <div class="form-group">
                        <label  for="nameInput">Nombre</label>
                        <div id="labelNE">
                           <input type="text" class="form-control" name="nameInputE" id="nameInputE" placeholder="Ingrese el nombre de la sucursal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cityInput">Ciudad</label>
                        <div id="cityIE">
                            <input type="text" class="form-control" name="cityInputE" id="cityInputE" placeholder="Ingrese la ciudad donde se encuentra la sucursal">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addressInput">Dirección</label>
                        <div id="adressIE">
                            <input type="text" class="form-control" name="addressInputE" id="addressInputE" placeholder="Ingrese la dirección de la sucursal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Imagen</label>
                        <input type="file" class="form-control" name="imageInputE" id="imageInputE" value="{{old('image')}}" placeholder="Seleccione la imagen de la sucursal">
                    </div>

                    <div class="card border">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-clock"></i> Horario de atención</h5>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="LunCIE">
                                            <input  class="form-check-input" type="checkbox" name="days[]" value="Monday" >
                                        </div>
                                        <label class="form-check-label">Lunes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="LunIE">
                                        <div id="MarIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="monday" id="mondayE"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="MarCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Tuesday" >
                                        </div>
                                        
                                        <label class="form-check-label">Martes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="MarIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="thursday" id="thursdayE"></div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="MieCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Wednesday" >
                                        </div>
                                        
                                        <label class="form-check-label">Miercoles</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="MieIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="wednesday" id="wednesdayE"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="JueCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Thursday" >
                                        </div>
                                        
                                        <label class="form-check-label">Jueves</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="JueIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="thursday" id="thursdayE"></div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="VieCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Friday" >
                                        </div>
                                        
                                        <label class="form-check-label">Viernes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="VieIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="friday" id="fridayE"></div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="SabCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Saturday">
                                        </div>
                                        
                                        <label class="form-check-label">Sabado</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="SabIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="saturday" id="saturdayE"></div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <div id="DomCIE">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Sunday">
                                        </div>
                                        
                                        <label class="form-check-label">Domingo</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <div id="DomIE"><input type="text" class="form-control float-right" value="12:00 AM - 12:00 AM" placeholder="HH:MM AM - HH:MM PM" name="sunday" id="sundayE"></div>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i> Actualizar</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
