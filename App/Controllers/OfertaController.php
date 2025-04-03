<?php 

namespace App\Controllers;

use Core\Controllers\ControllerInterface;
use Core\Views\View;
use App\Models\OfertaModel;
use Rap2hpoutre\FastExcel\FastExcel;

class OfertaController implements ControllerInterface {
    
    /**
     * 
     *
     * @return type
     **/
    public function index() {
        



        return View::render('oferta/index');
    }


    /**
     *
     * 
     * @param Type $var Description
     * @return type
     **/
    public function crear() {
        
        return View::render('oferta/crear', []);
    }





    /**
     * 
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function consultar() {

        // echo "<pre>";
        // print_r(  );
        // echo "</pre>";
        // die;


        return View::render('oferta/consultar', [
            'ofertas' => $this->obtenerOfertas(false),
        ]);
    }




    /**
     * 
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function detalle() {

        // echo "<pre>";
        // print_r(  );
        // echo "</pre>";
        // die;


        return View::render('oferta/detalle', [
            // 'ofertas' => $this->obtenerOfertas(false),
        ]);
    }









    # FUNCIONES AUXILIARES.
    public function obtenerOferta() {
        $oferta = OfertaModel::obtenerOfertas([
            'id' => $_POST['id_oferta'] ?? null,
        ]);

        return $oferta[0] ?? null;
    }


    
    public function obtenerOfertas() {
        $filtros = [
            'id'        => $_POST['id_oferta'] ?? null,
            'objeto'    => $_POST['objeto'] ?? null,
            'comprador' => $_POST['comprador'] ?? null,
            'estado'    => $_POST['estado'] ?? null,
        ];

        $ofertas = OfertaModel::obtenerOfertas($filtros);
        if ($_POST['echo'] ?? false) {
            echo json_encode($ofertas);
        } else {
            return $ofertas;
        }
    }



    public function generarExcel() {
        $filtros = [
            'id'        => $_POST['id_oferta'] ?? null,
            'objeto'    => $_POST['objeto'] ?? null,
            'comprador' => $_POST['comprador'] ?? null,
            'estado'    => $_POST['estado'] ?? null,
        ];

        $ofertas = OfertaModel::obtenerOfertas($filtros);

        $data = [];
        foreach ($ofertas as $oferta) {
            $data[] = [
                'ID' => $oferta['id'],
                'Objeto' => $oferta['objeto'],
                'Descripción' => $oferta['alcance'],
                'Fecha Inicio' => $oferta['fecha_inicio'],
                'Fecha Cierre' => $oferta['fecha_cierre'],
                'Estado' => $oferta['estado'],
                'Responsable de evento' => $oferta['responsable'],
            ];
        }

        $nombreExcel = 'reporte.xlsx';
        $rutaRelativa = '/reportes';
        $ruta = dirname(__FILE__, 3);

        if (! file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }

        (new FastExcel($data))->export("$ruta/$nombreExcel");
        echo "$rutaRelativa/$nombreExcel";
    }

    public function obtenerActividades() {
        $pagina = $_POST['pagina'] ?? 1; 
        $busqueda = $_POST['busqueda'] ?? null;
        $limite = 5; 

        $actividades = OfertaModel::obtenerActividades();

        if ($busqueda) {
            $actividades = array_filter($actividades, function ($actividad) use ($busqueda) {
                return stripos($actividad['titulo'], $busqueda) !== false || 
                       stripos($actividad['codigo'], $busqueda) !== false;
            });
        }
        
        $totalActividades = count($actividades);
        $totalPaginas = ceil($totalActividades / $limite);

        $inicio = ($pagina - 1) * $limite;
        $actividades = array_slice($actividades, $inicio, $limite);

        header('Content-Type: application/json');
        echo json_encode([
            'actividades' => $actividades,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $pagina,
        ]);
    }

    public function buscarActividad() {
        $busqueda = $_POST['busqueda'] ?? null;
        $pagina = $_POST['pagina'] ?? 1; 
        $limite = 5; 

        $actividades = OfertaModel::obtenerActividades();
        
        // Filtrar las actividades según la búsqueda
        if ($busqueda) {
            $actividades = array_filter($actividades, function($actividad) use ($busqueda) {
                return stripos($actividad['titulo'], $busqueda) !== false || stripos($actividad['codigo'], $busqueda) !== false;
            });
        }

        $totalActividades = count($actividades);

        // Calcular el número total de páginas
        $totalPaginas = ceil($totalActividades / $limite);

        // Calcular el índice inicial y final para la página actual
        $inicio = ($pagina - 1) * $limite;
        $actividades = array_slice($actividades, $inicio, $limite);

        // Responder con los datos paginados
        header('Content-Type: application/json');
        echo json_encode([
            'actividades' => array_values($actividades),
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $pagina,
        ]);
    }


    public function guardarOferta() {
        $oferta = $_POST['oferta'] ?? null;
        $cronograma = $_POST['cronograma'] ?? null;

        if ($oferta && $cronograma) {
            $ofertaGuardada = OfertaModel::guardarOferta($oferta, $cronograma);
            echo json_encode($ofertaGuardada);
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
    }

    public function guardarCronograma() {
        $cronograma = $_POST['cronograma'] ?? null;
        if ($cronograma) {
            $cronogramaGuardado = OfertaModel::guardarCronograma($cronograma);
            echo json_encode($cronogramaGuardado);
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
    }






}


