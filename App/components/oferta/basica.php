<div >
    <div>
        <h4>Información básica</h4>
    </div>

    <div class="row">

        <div class="col-6">
            <div class="mb-3">
                <label for="objectoInput" class="form-label">Objecto</label>
                <input type="text" class="form-control" id="objectoInput">
            </div>

            <div class="mb-3">
                <label for="descripcionInput" class="form-label">Descripción/Alcance</label>
                <textarea class="form-control" id="descripcionInput" rows="2" required></textarea>
            </div>

            <div class="row">

                <div class="col-6">
                    <label for="monedaInput" class="form-label">Moneda</label>

                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-currency-exchange"></i>
                        </span>
                        <select class="form-select" id="monedaInput" required>
                            <option selected>Seleccione...</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="COP">COP</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <label for="presupuestoInput" class="form-label">Presupuesto</label>

                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-currency-dollar"></i>
                        </span>
                        <input type="number" class="form-control" id="presupuestoInput" required>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-6">

            <div class="mb-3">
                <label for="actividadTitulo" class="form-label">Actividad</label>

                <div class="input-group">
                    <input type="hidden" id="actividadInput" name="actividadInput">

                    <input type="text" class="form-control" id="actividadTitulo" placeholder="Seleccione una actividad" readonly required>
                    <span class="input-group-text" onclick="abrirModal('actividad')">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>

        </div>

    </div>

    <hr class="border border-dark mt-5 mb-5">

    <div class="d-flex justify-content-center">

        <div class="btn btn-success d-flex align-items-center"">
            <div onclick="validarBasica()">
                Guardar
            </div>
        </div>

    </div>

    <!-- Modal for Actividad -->
    <div class="modal fade" id="modalActividad" tabindex="-1" aria-labelledby="modalActividadLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActividadLabel">Seleccionar Actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php $actividades = $actividades ?? []; ?>
                    <div class="table-responsive">

                        <div class="row mb-3">
                            <div class="col-6 input-group mb-3">
                                <input type="text" class="form-control" id="busquedaActividad" placeholder="Buscar actividad...">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="buscarActividad()">
                                    Buscar
                                </button>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>codigo</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="resultadoBusqueda">
                                <?php if (!empty($actividades)): ?>
                                    <?php foreach ($actividades as $actividad): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($actividad['id']) ?></td>
                                            <td><?= htmlspecialchars($actividad['codigo']) ?></td>
                                            <td><?= htmlspecialchars($actividad['titulo']) ?></td>
                                            <td>
                                                <button class="btn btn-primary" >
                                                    Seleccionar
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="alert alert-warning text-center">No se encontraron actividades.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div id="paginacion" class="d-flex justify-content-center mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination"></ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>