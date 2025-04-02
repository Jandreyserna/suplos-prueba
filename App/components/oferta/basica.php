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

    <hr class="border border-dark mt-5 mb-5">

    <div class="d-flex justify-content-center">

        <div class="btn btn-success d-flex align-items-center"">
            <div>
                Guardar
            </div>
        </div>

    </div>
</div>