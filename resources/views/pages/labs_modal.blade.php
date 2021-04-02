<!-- Add Lab Modal -->
<div class="modal fade" id="add_lab_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_lab_title">Datos de la sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="{{url('labs/save')}}">

                    @csrf

                    <div class="form-group">
                        <label for="nameInput">Nombre</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="nameInput" value="{{old('name')}}" placeholder="Ingrese el nombre de la sucursal">
                    </div>
                    <div class="form-group">
                        <label for="cityInput">Ciudad</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="city" id="cityInput" value="{{old('city')}}" placeholder="Ingrese la ciudad donde se encuentra la sucursal">
                    </div>
                    <div class="form-group">
                        <label for="addressInput">Dirección</label>
                        <input type="text" class="form-control" name="address" id="addressInput" value="{{old('address')}}" placeholder="Ingrese la dirección de la sucursal">
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Imagen</label>
                        <input type="file" class="form-control" name="image" id="imageInput" value="{{old('image')}}" placeholder="Seleccione la imagen de la sucursal">
                    </div>

                    <div class="card border">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-clock"></i> Horario de atención</h5>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Monday" checked>
                                        <label class="form-check-label">Lunes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="monday" id="monday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Tuesday" checked>
                                        <label class="form-check-label">Martes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="tuesday" id="tuesday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Wednesday" checked>
                                        <label class="form-check-label">Miercoles</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="wednesday" id="wednesday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Thursday" checked>
                                        <label class="form-check-label">Jueves</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="thursday" id="thursday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Friday" checked>
                                        <label class="form-check-label">Viernes</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="friday" id="friday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Saturday">
                                        <label class="form-check-label">Sabado</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="saturday" id="saturday">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Sunday">
                                        <label class="form-check-label">Domingo</label>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="sunday" id="sunday">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i> Registrar</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
