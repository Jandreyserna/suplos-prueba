<?php 

namespace Core\Views;

class View {

    /**
     * 
     *
     * @param string $view
     * @param array $data
     * @return void
     **/
    public static function render($view, $data = []) {
        // Extraer los datos para que estén disponibles en la vista.
        extract($data);

        // Inicia el buffer de salida.
        ob_start();
        include_once dirname(__FILE__, 3) . '/App/views/' . $view . '.php';
        // Obtiene el contenido del buffer y lo limpia.
        $content = ob_get_clean();

        require_once dirname(__FILE__, 3) . '/App/views/layouts/template.php';
    }

    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

}



