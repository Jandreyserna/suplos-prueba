<div class="container">
    <div class="row">

        <div class="d-flex justify-content-between">
            <h3>
                Consultar procesos / Eventos participación cerrada
            </h3>

            <div class="btn btn-dark d-flex align-items-center" onclick="loadView('oferta')">   
                <i class="bi bi-caret-left-fill"></i>

                <div>
                    Volver
                </div>
            </div>
        </div>

        <hr class="border border-warning">

        <div>
            <?=$viewObject::renderComponet('oferta/busqueda', ['ofertas' => $ofertas]); ?>
        </div>
    
    </div>

    <hr class="border border-dark mt-5 mb-5">
</div>