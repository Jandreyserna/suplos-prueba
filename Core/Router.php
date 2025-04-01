<?php 
require '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();







$ruta = $_SERVER['REQUEST_URI'];
$ruta = explode('/', $ruta);
$ruta = array_filter($ruta);
$ruta = array_values($ruta);

$namespace = 'App\\Controllers\\';

$controller = $ruta[0] ?? 'home';
$controller = $namespace . ucfirst($controller) . 'Controller';
$method = $ruta[1] ?? 'index';

if (class_exists($controller)) {
    $controller = new $controller;

    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        // 404 - redirigir al home
        // header('Location: /');


        echo "<pre>";
        print_r( 'step 1' );
        echo "</pre>";
        die;
    }

} else {

    echo "<pre>";
    print_r( 'step 2' );
    echo "</pre>";
    die;
    
    // 404 - redirigir al home

}



// echo "<pre>controller: ";
// print_r( $controller );
// echo "</pre>";

// echo "<pre>method: ";
// print_r( $method );
// echo "</pre>";
// die;






// echo "<pre>_GET: ";
// print_r( $ruta );
// echo "</pre>";


// echo "<pre>";
// print_r( $_SERVER['REQUEST_URI'] );
// echo "</pre>";
// die;



