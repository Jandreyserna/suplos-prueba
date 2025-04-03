<div class="container">
    <div class="row">

        <div class="d-flex justify-content-between">
            <h3>
                Proceso / Evento participación cerrada
            </h3>

            <div class="btn btn-dark d-flex align-items-center" onclick="loadView('oferta/consultar', 'index')">   
                <i class="bi bi-caret-left-fill"></i>

                <div>
                    Volver
                </div>
            </div>
        </div>

        <div>
            <h4>Información básica</h4>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="objectoInput" class="form-label">Objecto</label>
                    <input type="text" class="form-control" id="objectoInput" disabled>
                </div>

                <div class="mb-3">
                    <label for="descripcionInput" class="form-label">Descripción/Alcance</label>
                    <textarea class="form-control" id="descripcionInput" rows="2" disabled></textarea>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="monedaInput" class="form-label">Moneda</label>

                        <div class="input-group ">
                            <span class="input-group-text">
                                <i class="bi bi-currency-exchange"></i>
                            </span>
                            <select class="form-select" id="monedaInput" disabled>
                                <option selected>Seleccione...</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="presupuestoInput" class="form-label">Presupuesto</label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-currency-dollar"></i>
                            </span>
                            <input type="number" class="form-control" id="presupuestoInput" disabled>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="actividadInput" class="form-label">Actividad</label>

                    <div class="input-group">
                        <input type="text" class="form-control" id="actividadInput" disabled>
                    </div>
                </div>
            </div>

        </div>



        <ul class="nav nav-tabs my-4" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Cronograma</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Documentación petición de ofertas</a>
            </li>
        </ul>

        <hr class="border border-warning">

        <div class="tab-content pt-5" id="tab-content">
            <div class="tab-pane active" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                <?=$viewObject::renderComponet('oferta/detalle/cronograma'); ?>
            </div>
            
            <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                <?=$viewObject::renderComponet('oferta/detalle/documentacion'); ?>
            </div>
        </div>
    </div>

</div>

<script>
    obtenerOferta();
</script>