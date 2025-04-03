
function loadView(controller, method = 'index') {
    location.href = `/${controller}/${method}`;
}

function verOferta(idOferta) {
    localStorage.setItem('idOferta', idOferta);
    loadView('oferta', 'detalle');
}

function obtenerFiltros() {
    return {
        id_oferta: $('#idCerrada').val(),
        objeto: $('#objeto').val(),
        comprador: $('#comprador').val(),
        estado: $('#estado').val(),
    }
}

function buscarOfertas() {
    const filtros = obtenerFiltros();
    filtros.echo = true;

    $.ajax({
        url: '/oferta/obtenerOfertas',
        type: 'POST',
        data: filtros,
        beforeSend: function () {
            mostrarSpinner('resultadoBusqueda');
        },
        success: function (response) {
            ofertas = JSON.parse(response) ?? [];
            actualizarTablaOferta('resultadoBusqueda', ofertas);
        },
        error: function (error) {
            console.error('Error:', error);
            $('#resultadoBusqueda').html('<p>Error al cargar los datos.</p>');
        }
    });
}

function actualizarTablaOferta(idElmento, ofertas) {
    let html = '';

    if (! ofertas || ofertas?.length <= 0) {
        html = `<tr colspan="8">
            <td colspan="8" class="alert alert-warning" role="alert">
                No se encontraron resultados.
            </td>
        </tr>`;
    } else {
        ofertas?.map(oferta => {
            html += `<tr>
                <td>${oferta?.id ?? ''}</td>
                <td>${oferta?.objeto ?? ''}</td>
                <td>${oferta?.alcance ?? ''}</td>
                <td>${oferta?.fecha_inicio ?? ''}</td>
                <td>${oferta?.fecha_cierre ?? ''}</td>
                <td>${oferta?.estado ?? ''}</td>
                <td>${oferta?.responsable ?? ''}</td>
                <td>
                    <button class='btn btn-primary'>
                        Ver
                    </button>
                </td>
            </tr>`;
        });
    }

    $(`#${idElmento}`).html(html);  
}

function mostrarSpinner(idElemento) {
    $(`#${idElemento}`).html(`<div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>`);
}

function generarExcel() {
    const filtros = obtenerFiltros();

    $.ajax({
        url: '/oferta/generarExcel',
        type: 'POST',
        data: filtros,
        success: function (ruta) {
            const link = document.createElement("a");
            link.href = ruta;
            link.setAttribute("download", 'reporte_procesos.xlsx');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function obtenerOferta() {
    $.ajax({
        url: '/oferta/obtenerOfertas',
        type: 'POST',
        data: {
            id_oferta: localStorage.getItem('idOferta'),
            echo: true
        },
        beforeSend: function () {
            mostrarSpinner('resultadoBusqueda');
        },
        success: function (response) {
            let oferta = JSON.parse(response) ?? [];

            if (oferta?.length > 0) {
                oferta = oferta[0];
                actualizarDetalleOferta(oferta);
            } else {

                // ...PENDIENTE

            }
        },
        error: function (error) {
            console.error('Error:', error);
            $('#resultadoBusqueda').html('<p>Error al cargar los datos.</p>');
        }
    });
}

function actualizarDetalleOferta(oferta) {
    $('#objectoInput').val(oferta.objeto);
    $('#descripcionInput').val(oferta.alcance);
    $('#monedaInput').html(`<option selected>${oferta.moneda}<option>`);
    $('#presupuestoInput').val(oferta.presupuesto);

    // PENDIENTE.
    $('#actividadInput').val(oferta.id_actividad);


    // Cronocrama.
    $('#fechaInicioInput').val(oferta.fecha_inicio);
    $('#horaInicioInput').val(oferta.hora_inicio);
    $('#fechaCierreInput').val(oferta.fecha_cierre);
    $('#horaCierreInput').val(oferta.hora_cierre);

    // Documentos.

}