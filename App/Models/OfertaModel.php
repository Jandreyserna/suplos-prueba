<?php 

namespace App\Models;

use Core\DB\DB;

class OfertaModel {
    
    /**
     * @param Type $var Description
     * @return type
     **/
    public static function obtenerOfertas($filtros = []) {
        $query = "SELECT *
            FROM ofertas
            JOIN cronograma ON cronograma.id = ofertas.id_cronograma
        ";

        $wheres = [];
        $aplicarFiltros = [];
        if (isset($filtros['id']) && ! empty($filtros['id'])) {
            $aplicarFiltros['id'] = $filtros['id'];
            $wheres[] = "ofertas.id = :id";
        }
        if (isset($filtros['objeto']) && ! empty($filtros['objeto'])) {
            $aplicarFiltros['objeto'] = "%{$filtros['objeto']}%";
            $wheres[] = "(ofertas.objeto LIKE :objeto OR ofertas.alcance LIKE :objeto)";
        }
        if (isset($filtros['comprador']) && ! empty($filtros['comprador'])) {
            $aplicarFiltros['comprador'] = "%{$filtros['comprador']}%";
            $wheres[] = "ofertas.responsable LIKE :comprador";
        }
        if (isset($filtros['estado']) && ! empty($filtros['estado'])) {
            $aplicarFiltros['estado'] = $filtros['estado'];
            $wheres[] = "ofertas.estado = :estado";
        }
        if (count($wheres) > 0) {
            $query .= " WHERE " . implode(" AND ", $wheres);
        }

        return DB::execute($query, $aplicarFiltros);
    }

    /**
     * @param Type $var Description
     * @return type
     **/
    public static function obtenerActividades() {
        $query = "SELECT id, codigo, titulo 
              FROM actividades 
              WHERE estado = 'activo' ";
        return DB::execute($query);
    }

    /**
     * @param Type $var Description
     * @return type
     **/
    public static function guardarOferta($infoBasica, $idCronograma) {
        
        $query = "INSERT INTO ofertas (id_cronograma, id_actividad, objeto, alcance, moneda, presupuesto, responsable, estado, created_at) 
              VALUES (:cronograma,:actividad, :objecto, :descripcion, :moneda, :presupuesto, 'suplos 1', 'activo', NOW())";
        return DB::execute($query, [
            'cronograma' =>(int) $idCronograma,
            'actividad' => $infoBasica['actividad'],
            'objecto'   => $infoBasica['objecto'],
            'descripcion' => $infoBasica['descripcion'],
            'moneda'    => $infoBasica['moneda'],
            'presupuesto' => $infoBasica['presupuesto'],
        ]);
    }

    /**
     * @param Type $var Description
     * @return type
     **/
    public static function guardarCronograma($cronograma) {
        $query = "INSERT INTO cronograma (fecha_inicio, hora_inicio, fecha_cierre, hora_cierre, created_at) 
              VALUES (:fecha_inicio, :hora_inicio, :fecha_cierre, :hora_cierre, NOW())";
        DB::execute($query, [
            'fecha_inicio' => $cronograma['fechaInicio'],
            'hora_inicio' => $cronograma['horaInicio'],
            'fecha_cierre' => $cronograma['fechaCierre'],
            'hora_cierre' => $cronograma['horaCierre'],
        ]);
        return DB::lastInsertId();
    }


}


