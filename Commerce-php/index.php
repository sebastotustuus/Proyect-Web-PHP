<?php

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/Layout/header.php';
require_once 'views/Layout/sidebar.php';



if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';

}

elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
    }

else{
    echo "La pagina que buscas no existe";
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();

    } elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
        }
    
    else {
        echo "La Pagina que buscas no Existe";
    }
    
} else {
    echo "No existe la Página que buscas";
}


require_once 'views/Layout/footer.php';
