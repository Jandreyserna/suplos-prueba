<?php 

namespace App\Controllers;

use Core\Controllers\ControllerInterface;
use Core\Views\View;
use Core\DB\DB;

class OfertaController implements ControllerInterface {
    
    /**
     * 
     *
     * @return type
     **/
    public function index() {
        
        // echo "<pre>";
        // print_r( 'Index' );
        // echo "</pre>";
        // die;


        return View::render('oferta/index', ['casa' => 'steven']);
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
        echo "<pre>";
        print_r( 'CONSULTAR' );
        echo "</pre>";
        die;
    }














    #####################################
    // LLAMADOS A LA BASE DE DATOS.


    /**
     * 
     *
     * @param Type $var Description
     * @return type
     **/
    public function obtenerOferta() {
        $query = "SELECT * FROM ofertas";


        $ofertas = DB::execute($query);


        echo "<pre>ofertas: ";
        print_r( $ofertas );
        echo "</pre>";
        die;




    }





}


