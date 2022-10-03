<?php
require_once ('app/controllers/tipoInsumoController.php');
require_once ('app/controllers/insumoController.php');
require_once ('app/controllers/homeController.php');


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// leo el parametro accion
$action = 'Home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

// parsea la accion Ej: about/juan --> ['about', 'juan']
$params = explode('/', $action); // genera un arreglo
    
$controllerTipoInsumo = new tipoInsumoController();
$controllerInsumo = new insumoController();
$controllerHome = new homeController();

switch ($params[0]) {
    case 'Home':
        $controllerHome->showHome();
        break;
    case 'Tipos_Insumos':
        $controllerTipoInsumo->showAllTiposInsumos();
        break;
    case 'Edit_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo->showFormUpdateTipoInsumoById($id);
        break;
    case 'Update_Tipo_Insumo':
        $controllerTipoInsumo->saveUpdateTipoInsumo();
        break;
    case 'Delete_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo->deleteTipoInsumoById($id);
    case 'Add_Tipo_Insumo':
        $controllerTipoInsumo->showFormAddTipoInsumo();
        break;
    case 'Save_Tipo_Insumo':
        $controllerTipoInsumo->saveNewTipoInsumo();
        break;
    case 'Insumos':
        $controllerInsumo->showAllInsumos();
        break;
    case 'Add_Insumo':
        $controllerInsumo->showFormAddInsumo();
        break;
    case 'Save_Insumo':
        $controllerInsumo->saveNewInsumo();
        break;
    case 'Edit_Insumo':
        $id = $params[1];
        $controllerInsumo->showFormUpdateInsumoById($id);
        break;
    case 'Update_Insumo':
        $controllerInsumo->saveUpdateInsumo();
        break;
    case 'Delete_Insumo':
        $id = $params[1];
        $controllerInsumo->deleteInsumoById($id);
        break;
    case 'View_Insumo':
        $id = $params[1];
        $controllerInsumo->showInsumo($id);
        break;
    case 'View_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo->showTipoInsumoById($id);
        break;
    case 'Filtrar_Tipo_Insumo':
        $controllerInsumo->showFilterByTipoInsumo();
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo "404 not found";
        break;
}