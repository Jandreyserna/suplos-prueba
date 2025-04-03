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

        $viewObject = new View();

        // Inicia el buffer de salida.
        ob_start();
        include_once dirname(__FILE__, 3) . '/App/views/' . $view . '.php';
        // Obtiene el contenido del buffer y lo limpia.
        $content = ob_get_clean();

        require_once dirname(__FILE__, 3) . '/App/views/layouts/template.php';
    }


    /**
     * 
     *
     * @param string $view
     * @param array $data
     * @return void
     **/
    public static function renderComponet($component, $data = []) {
        // Extraer los datos para que estén disponibles en la vista.
        extract($data);

        // Inicia el buffer de salida.
        ob_start();
        include dirname(__FILE__, 3) . '/App/components/' . $component . '.php';
        // Obtiene el contenido del buffer y lo limpia.
        return ob_get_clean();
    }


    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

}



