<div class="container">
    <div class="row">

        <div class="d-flex justify-content-between">
            <h3>
                Crear proceso / Evento participación cerrada
            </h3>

            <div class="btn btn-dark d-flex align-items-center"">   
                <i class="bbi bi-caret-left-fill"></i>

                <div>
                    Volver
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Información básica</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Cronograma</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Documentación petición de ofertas</a>
            </li>
        </ul>

        <hr class="border border-warning">

        <div class="tab-content pt-5" id="tab-content">
            <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
            
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
                            <textarea class="form-control" id="descripcionInput" rows="2"></textarea>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <label for="monedaInput" class="form-label">Moneda</label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-currency-exchange"></i>
                                    </span>
                                    <select class="form-select" id="monedaInput">
                                        <option selected>Seleccione...</option>
                                        <option value="1">USD</option>
                                        <option value="2">EUR</option>
                                        <option value="3">COP</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="presupuestoInput" class="form-label">Presupuesto</label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-currency-dollar"></i>
                                    </span>
                                    <input type="number" class="form-control" id="presupuestoInput">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-6">

                        <div class="mb-3">
                            <label for="actividadInput" class="form-label">Actividad</label>

                            <div class="input-group">
                                <input type="text" class="form-control" id="actividadInput" disabled>
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
                
            </div>
            
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                
                <div>
                    <h4>Cronograma</h4>
                </div>

                <div class="d-flex">

                    <div class="col-2 m-3">
                        <label for="fechaInicioInput" class="form-label">Fecha inicio</label>

                        <div class="input-group">
                            <input type="date" class="form-control" id="fechaInicioInput" >
                            <span class="input-group-text">
                                <i class="bi bi-calendar2-minus"></i>
                            </span>
                        </div>
                        <small class="form-text text-muted d-flex justify-content-end">(AAAA/MM/DD)</small>
                    </div>

                    <div class="col-2 m-3">
                        <label for="horaInicioInput" class="form-label">Hora inicio</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="horaInicioInput" >
                            <span class="input-group-text">
                                <i class="bi bi-clock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-2 m-3">
                        <label for="fechaCierreInput" class="form-label">Fecha cierre</label>

                        <div class="input-group">
                            <input type="date" class="form-control" id="fechaCierreInput" >
                            <span class="input-group-text">
                                <i class="bi bi-calendar2-minus"></i>
                            </span>
                        </div>
                        <small class="form-text text-muted d-flex justify-content-end">(AAAA/MM/DD)</small>
                    </div>

                    <div class="col-2 m-3">
                        <label for="horaCierreInput" class="form-label">Hora cierre</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="horaCierreInput" >
                            <span class="input-group-text">
                                <i class="bi bi-clock"></i>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                
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

            </div>
        </div>
    
    </div>

    <hr class="border border-dark mt-5 mb-5">

    <div class="d-flex justify-content-center">

        <div class="btn btn-success d-flex align-items-center"">
            <div>
                Guardar
            </div>
        </div>

    </div>

    <hr class="border border-dark mt-5 mb-5">
</div>


