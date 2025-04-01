<?php 

namespace App\Controllers;

use Core\Controllers\ControllerInterface;
use Core\Views\View;

class ModuloController implements ControllerInterface {
    
    /**
     * @return void
     **/
    public function index() {
        return View::render('modulos/ofertas');
    }




}


