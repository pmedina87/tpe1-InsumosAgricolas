<?php
require_once ('tipoInsumo/tipoInsumoController.php');
require_once ('./templates/home.php');
// require_once 'about.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// leo el parametro accion
$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    // var_dump($_GET);
    $action = $_GET['action'];  // action => about/juan
}

// parsea la accion Ej: about/juan --> ['about', 'juan']
$params = explode('/', $action); // genera un arreglo
    
switch ($params[0]) {
    case 'Home':
       'home.php';
        break;
    case 'Tipos_Insumos':
        $controller = new tipoInsumoController();
        $controller->showAllTiposInsumos();
        break;
    case 'Edit':
        $id = $params[1];
        $controller = new tipoInsumoController();
        $controller->showTipoInsumoById($id);
        break;
    case 'Delete':
        $id = $params[1];
        $controller = new tipoInsumoController();
        $controller->deleteTipoInsumoById($id);
        
        break;

//     case 'about':
//         if (empty($params[1])) {
//             showAbout();
//         } else {
//             showAbout($params[1]);
//         }
//         break;
    default:
        echo "404 not found";
        # code...
        break;
}