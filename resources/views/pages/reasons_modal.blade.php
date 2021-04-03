<!-- Add Field Modal -->
<div class="modal fade" id="add_reason_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_reason_title">Datos del motivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('reasons/save')}}">

                    @csrf

                    <div class="form-group">
                        <label for="nameInput">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Ingrese el nombre del motivo">
                    </div>

                    <div class="form-group">
                        <label for="serieInput">Tipo</label>
                        <select class="custom-select form-control-border" name="serie" id="serieInput" placeholder="Seleccione la serie para el motivo">
                            @for ($i = 65; $i <= 90; $i++)
                                <option value="{{chr($i)}}">{{chr($i)}}</option>
                            @endfor
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i> Registrar</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
