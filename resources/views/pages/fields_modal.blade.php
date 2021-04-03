<!-- Add Field Modal -->
<div class="modal fade" id="add_field_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_field_title">Datos del campo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('fields/save')}}">

                    @csrf

                    <div class="form-group">
                        <label for="nameInput">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Ingrese el nombre del campo">
                    </div>
                    <div class="form-group">
                        <label for="typeInput">Tipo</label>
                        <select class="custom-select form-control-border" name="type" id="typeInput" placeholder="Seleccione el tipo del campo">
                            <option value="T">Texto</option>
                            <option value="N">Número</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="positionInput">Posición</label>
                        <input type="number" value="1" min="1" class="form-control" name="position" id="positionInput" placeholder="Ingrese la posición del campo">
                    </div>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i> Registrar</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
