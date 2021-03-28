<!-- Processes Modal -->
<div class="modal fade" id="processes_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="processes_title">Procesos registrados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="processes_table" class="table table-sm table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No Proceso</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody id="processes_rows">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
