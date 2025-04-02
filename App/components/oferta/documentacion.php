<div>

    <div>
        <h4>Contenido - Documentación petición de ofertas/Términos y condiciones del proceso</h4>
    </div>

    <div>
        <table class="table table-bordered table-hover">

            <thead class="table-dark rounded">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">tipo</th>
                    <th scope="col">titulo</th>
                    <th scope="col">contenido</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
        </table>

    </div>

    <div>
        
        <div class="d-grid gap-2 d-md-block">

        <div class="mb-3">
            <button class="btn btn-secondary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalAgregarContenido">
                <i class="bi bi-plus me-2"></i> Agregar contenido
            </button>
        </div>

        </div>

        <div class="modal fade" id="modalAgregarContenido" tabindex="-1" aria-labelledby="modalAgregarContenidoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Encabezado del modal -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarContenidoLabel">Agregar Contenido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <!-- Aquí puedes agregar el formulario o contenido que desees -->
                        <form>
                            <div class="mb-3">
                                <label for="tipoContenido" class="form-label">Tipo</label>
                                <select class="form-select" id="tipoContenido">
                                    <option selected>Seleccione...</option>
                                    <option value="1">Excel</option>
                                    <option value="2">Pdf</option>
                                    <option value="3">Word</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tituloContenido" class="form-label">Título</label>
                                <input type="text" class="form-control" id="tituloContenido" placeholder="Ingrese el título">
                            </div>

                            <div class="mb-3">
                                <label for="contenidoArchivo" class="form-label">Contenido</label>
                                <input class="form-control" type="file" id="contenidoArchivo" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                        </form>
                    </div>
                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr class="border border-dark mt-5 mb-5">

    <div class="d-flex justify-content-center">

        <div class="btn btn-success d-flex align-items-center m-2">
            <div>
                Guardar
            </div>
        </div>

        <div class="btn btn-secondary d-flex align-items-center m-2">
            <div>
                Ver
            </div>
        </div>

    </div>

</div>