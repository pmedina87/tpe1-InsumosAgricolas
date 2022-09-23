<?php
require_once ('app/controllers/tipoInsumoController.php');
require_once ('app/controllers/insumoController.php');
require_once ('templates/home.php');
// require_once 'about.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// leo el parametro accion
$action = 'Home'; // accion por defecto
if (!empty($_GET['action'])) {
    // var_dump($_GET);
    $action = $_GET['action'];  // action => about/juan
}

// parsea la accion Ej: about/juan --> ['about', 'juan']
$params = explode('/', $action); // genera un arreglo
    
// $controller = new tipoInsumoController();
switch ($params[0]) {
    case 'Home':
       'home.php';
        break;
    case 'Tipos_Insumos':
        $controller = new tipoInsumoController();
        $controller->showAllTiposInsumos();
        break;
    case 'Edit_Tipo_Insumo':
        $id = $params[1];
        $controller = new tipoInsumoController();
        $controller->showTipoInsumoById($id);
        break;
    case 'Delete_Tipo_Insumo':
        $id = $params[1];
        $controller = new tipoInsumoController();
        $controller->deleteTipoInsumoById($id);
    case 'Add_Tipo_Insumo':
        $controller = new tipoInsumoController();
        $controller->showFormAddTipoInsumo();
        break;
    case 'Save_Tipo_Insumo':
        $controller = new tipoInsumoController();
        $controller->saveNewTipoInsumo();
        break;
    case 'Insumos':
        $controller = new insumoController();
        $controller->showAllInsumos();
        break;
    case 'Add_Insumo':
        $controller = new insumoController();
        $controller->showFormAddInsumo();
        break;
    case 'Save_Insumo':
        $controller = new insumoController();
        $controller->saveNewInsumo();
        break;
    case 'Edit_Insumo':
        $id = $params[1];
        $controller = new insumoController();
        $controller->showInsumoById($id);
        break;
    case 'Delete_Insumo':
        $id = $params[1];
        $controller = new insumoController();
        $controller->deleteInsumoById($id);
//     case 'about':
//         if (empty($params[1])) {
//             showAbout();
//         } else {
//             showAbout($params[1]);
//         }
//         break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo "404 not found";
        # code...
        break;
}