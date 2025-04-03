<div class="container">
    <div class="row">

        <div class="d-flex justify-content-between">
            <h3>
                Crear proceso / Evento participación cerrada
            </h3>

            <div class="btn btn-dark d-flex align-items-center" onclick="loadView('oferta', 'index')">   
                <i class="bi bi-caret-left-fill"></i>

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
                <?=$viewObject::renderComponet('oferta/basica'); ?>
            </div>
            
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                <?=$viewObject::renderComponet('oferta/cronograma'); ?>
            </div>
            
            <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                <?=$viewObject::renderComponet('oferta/documentacion'); ?>
            </div>
        </div>
    
    </div>

    <hr class="border border-dark mt-5 mb-5">
</div>


