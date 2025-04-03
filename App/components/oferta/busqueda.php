<div>
    <div>
        <h4>Búsqueda</h4>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="idCerrada">ID cerrada</label>
            <input type="text" class="form-control" id="idCerrada" placeholder="Número id procesos/eventos">
        </div>

        <div class="col-md-4">
            <label for="objeto">Objeto/Descripción</label>
            <input type="text" class="form-control" id="objeto" placeholder="Objeto/Descripción">
        </div>

        <div class="col-md-4">
            <label for="comprador">Comprador</label>
            <input type="text" class="form-control" id="comprador" placeholder="Responsable Evento">
        </div>

        <div class="col-4">
            <label for="estado">Estado</label>
            <select class="form-select" id="estado">
                <option selected value="">Seleccione...</option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="PUBLICADO">PUBLICADO</option>
                <option value="EVALUACIÓN">EVALUACIÓN</option>
            </select>
        </div>
    </div>

    
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary m-2" onclick="buscarOfertas()">
            Buscar
        </button>
        <button type="button" class="btn btn-success m-2" onclick="generarExcel()">
            <i class="bi bi-file-earmark-excel-fill ml-2"></i> Generar Excel
        </button>
    </div>

    <div>
        
        <div>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
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
                    <?php
                        
                        foreach ($ofertas as $oferta) {
                            echo "<tr>
                                <td>$oferta[id]</td>
                                <td>$oferta[objeto]</td>
                                <td>$oferta[alcance]</td>
                                <td>$oferta[fecha_inicio]</td>
                                <td>$oferta[fecha_cierre]</td>
                                <td>$oferta[estado]</td>
                                <td>$oferta[responsable]</td>
                                <td>
                                    <button class='btn btn-primary' onclick='verOferta($oferta[id])'>
                                        Ver
                                    </button>
                                </td>
                            </tr>";
                        } ?>
                </tbody>
            </table>


            


            <div class="text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>






    </div>
</div>