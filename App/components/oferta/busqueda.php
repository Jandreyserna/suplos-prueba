<div>
    <div>
        <h4>Búsqueda</h4>
    </div>

    <div class="row">

        <div class="col-4 ">
            <label for="idCerrada">ID cerrada</label>
            <input type="text" class="form-control" id="idCerrada" placeholder="Número id procesos/eventos">
        </div>

        <div class="col-4 ">
            <label for="objeto">Objeto/Descripción</label>
            <input type="text" class="form-control" id="objeto" placeholder="Objeto/Descripción">
        </div>

        <div class="col-4 ">
            <label for="comprador">comprador</label>
            <input type="text" class="form-control" id="comprador" placeholder="Responsable Evento">
        </div>

    </div>

    <div class="row">

        <div class="col-4">
            <label for="estado">Estado</label>
            <select class="form-select" id="estado">
                <option selected>Seleccione...</option>
                <option value="1">Abierto</option>
                <option value="2">Cerrado</option>
                <option value="3">Anulado</option>
                <option value="4">Suspendido</option>
            </select>
        </div>

    </div>  
    
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary m-2">Buscar</button>
        <button type="button" class="btn btn-success m-2"><i class="bi bi-file-earmark-excel-fill ml-2"></i> Generar Excel</button>
    </div>

    <div>
        
        <div>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ronda</th>
                        <th scope="col">Objeto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Cierre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Responsable de evento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="resultadoBusqueda">
                </tbody>
            </table>
        </div>

    </div>
</div>