let terminoBusqueda = '';
let databasica = {
    objecto: null,
    descripcion: null,
    moneda: null,
    presupuesto: null,
    actividad: null
};

function validarBasica() 
{
    const objecto = document.getElementById('objectoInput').value;
    const descripcion = document.getElementById('descripcionInput').value;
    const moneda = document.getElementById('monedaInput').value;
    const presupuesto = document.getElementById('presupuestoInput').value;
    const actividad = document.getElementById('actividadInput').value;

    datos = {
        objecto,
        descripcion,
        moneda,
        presupuesto,
        actividad
    };

    databasica = datos;

    for (const key in datos) {
        if (datos[key].trim() === '') {
            alert(`El campo ${key} no puede estar vacío o lleno de espacios.`);
            return;
        }
    }

    if (!objecto || !descripcion || moneda === 'Seleccione...' || !presupuesto) {
        alert('Por favor, complete todos los campos obligatorios.');
        return;
    }

    const currentTab = document.querySelector('.nav-link.active'); 
    const nextTab = currentTab.parentElement.nextElementSibling?.querySelector('.nav-link'); 

    if (nextTab) {
        
        currentTab.classList.remove('active');
        currentTab.setAttribute('aria-selected', 'false');

        nextTab.classList.add('active');
        nextTab.setAttribute('aria-selected', 'true');

        const currentPanel = document.querySelector('.tab-pane.active'); 
        const nextPanelId = nextTab.getAttribute('href'); 
        const nextPanel = document.querySelector(nextPanelId);

        if (currentPanel && nextPanel) {
            currentPanel.classList.remove('active');
            nextPanel.classList.add('active');
        }
    }

    alert('Datos de información básica validados correctamente.');
}

function abrirModal(modalId) {
    if (modalId === 'actividad') {
        const modal = new bootstrap.Modal(document.getElementById('modalActividad'));
        modal.show();

        cargarActividades(1); 
    }
}

function cargarActividades(pagina) {
    $.ajax({
        url: '/oferta/obtenerActividades',
        type: 'POST',
        data: { 
            pagina: pagina,
            busqueda: terminoBusqueda
         },
        success: function (response) {
            const { actividades, totalPaginas, paginaActual } = response;
            actualizarTablaActividades('resultadoBusqueda', actividades);
            actualizarPaginacion(totalPaginas, paginaActual);
        },
        error: function (error) {
            console.error('Error al cargar las actividades:', error);
            $('#resultadoBusqueda').html('<tr><td colspan="4" class="alert alert-danger">Error al cargar las actividades.</td></tr>');
        }
    });
}

function actualizarPaginacion(totalPaginas, paginaActual) {
    const paginacion = document.querySelector('#paginacion .pagination');
    paginacion.innerHTML = ''; 

    const maxVisiblePages = 6; 
    const startPage = Math.max(1, paginaActual - Math.floor(maxVisiblePages / 2));
    const endPage = Math.min(totalPaginas, startPage + maxVisiblePages - 1);

    const prevItem = document.createElement('li');
    prevItem.className = `page-item ${paginaActual === 1 ? 'disabled' : ''}`;
    prevItem.innerHTML = `
        <a class="page-link" href="#" aria-label="Previous" onclick="cargarActividades(${paginaActual - 1})">
            <span aria-hidden="true">&laquo;</span>
        </a>`;
    paginacion.appendChild(prevItem);

    for (let i = startPage; i <= endPage; i++) {
        const pageItem = document.createElement('li');
        pageItem.className = `page-item ${i === paginaActual ? 'active' : ''}`;
        pageItem.innerHTML = `<a class="page-link" href="#" onclick="cargarActividades(${i})">${i}</a>`;
        paginacion.appendChild(pageItem);
    }

    const nextItem = document.createElement('li');
    nextItem.className = `page-item ${paginaActual === totalPaginas ? 'disabled' : ''}`;
    nextItem.innerHTML = `
        <a class="page-link" href="#" aria-label="Next" onclick="cargarActividades(${paginaActual + 1})">
            <span aria-hidden="true">&raquo;</span>
        </a>`;
    paginacion.appendChild(nextItem);
}

function seleccionarActividad(nombreActividad) {
    document.getElementById('actividadInput').value = nombreActividad;
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalActividad'));
    modal.hide();
}

function actualizarTablaActividades(idElmento, actividades) {
    let html = '';

    if (!actividades || actividades?.length <= 0) {
        html = `<tr colspan="8">
            <td colspan="8" class="alert alert-warning" role="alert">
                No se encontraron resultados.
            </td>
        </tr>`;
    } else {
        actividades?.map(actividad => {
            html += `<tr>
                <td>${actividad?.id ?? ''}</td>
                <td>${actividad?.codigo ?? ''}</td>
                <td>${actividad?.titulo ?? ''}</td>
                <td>
                    <button class='btn btn-primary' onclick="seleccionarActividad('${actividad?.id}', '${actividad?.titulo}')">
                        Seleccionar
                    </button>
                </td>
            </tr>`;
        });
    }

    $(`#${idElmento}`).html(html);  
}

function buscarActividad() {
    terminoBusqueda = document.getElementById('busquedaActividad').value;
    $.ajax({
        url: '/oferta/buscarActividad',
        type: 'POST',
        data: { 
            busqueda: terminoBusqueda,
            pagina: 1 
         },
        success: function (response) {
            const { actividades, totalPaginas, paginaActual } = response;
            actualizarTablaActividades('resultadoBusqueda', actividades);
            actualizarPaginacion(totalPaginas, paginaActual);
        },
        error: function (error) {
            console.error('Error al buscar actividades:', error);
            $('#resultadoBusqueda').html('<tr><td colspan="4" class="alert alert-danger">Error al buscar actividades.</td></tr>');
        }
    });
}

function seleccionarActividad(id, titulo) {
    document.getElementById('actividadInput').value = id;

    document.getElementById('actividadTitulo').value = titulo;

    const modal = bootstrap.Modal.getInstance(document.getElementById('modalActividad'));
    modal.hide();

}

function validarCronograma() {
    const fechaInicio = document.getElementById('fechaInicioInput').value;
    const horaInicio = document.getElementById('horaInicioInput').value;
    
    const fechaCierre = document.getElementById('fechaCierreInput').value;
    const horaCierre = document.getElementById('horaCierreInput').value;
    console.log(fechaInicio, horaInicio, fechaCierre, horaCierre);

    const datos = {
        fechaInicio,
        horaInicio,
        fechaCierre,
        horaCierre
    };

    for (const key in datos) {
        if (datos[key].trim() === '') {
            alert(`El campo ${key} no puede estar vacío.`);
            return;
        }
    }

    if (!fechaInicio || !horaInicio || !fechaCierre  || !horaCierre) {
        alert('Por favor, complete todos los campos obligatorios.');
        return;
    }

    alert('Datos de cronograma validados correctamente.');
    for (const key in databasica) {
        if (!databasica[key] || databasica[key].trim() === '') {
            alert(`El campo ${key} en la vista información básica no puede estar vacío.`);
            return;
        }
    }

    guardarOferta();
}

async function  guardarOferta() {
    const objecto = document.getElementById('objectoInput').value;
    const descripcion = document.getElementById('descripcionInput').value;
    const moneda = document.getElementById('monedaInput').value;
    const presupuesto = document.getElementById('presupuestoInput').value;
    const actividad = document.getElementById('actividadInput').value;
    const fechaInicio = document.getElementById('fechaInicioInput').value;
    const horaInicio = document.getElementById('horaInicioInput').value;
    const fechaCierre = document.getElementById('fechaCierreInput').value;
    const horaCierre = document.getElementById('horaCierreInput').value;

    console.log(objecto, descripcion, moneda, presupuesto, actividad, fechaInicio, horaInicio, fechaCierre, horaCierre);
    
    try {
        let idCronograma = null;
        const response = await $.ajax({
            url: '/oferta/guardarCronograma',
            type: 'POST',
            data: {
                cronograma: {
                    fechaInicio,
                    horaInicio,
                    fechaCierre,
                    horaCierre
                },
            }
        });
        console.log('Cronograma guardada correctamente:', response);
        alert('Cronograma guardada correctamente.');
        idCronograma = parseInt(response.replace(/"/g, ''), 10);

        const response2 = await $.ajax({
            url: '/oferta/guardarOferta',
            type: 'POST',
            data: {
                oferta: {
                    objecto,
                    descripcion,
                    moneda,
                    presupuesto,
                    actividad
                },
                cronograma: idCronograma,
            }
        });
        alert('Oferta guardada correctamente.');
    } catch (error) {
        console.error('Error al guardar la oferta:', error);
        alert('Error al guardar la oferta.');
    }

}