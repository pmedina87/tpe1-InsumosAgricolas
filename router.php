<?php
require_once ('app/controllers/tipoInsumoController.php');
require_once ('app/controllers/insumoController.php');
require_once ('app/controllers/homeController.php');
require_once ('app/controllers/usuarioController.php');
require_once ('app/controllers/authController.php');


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// leo el parametro accion
$action = 'Home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

// parsea la accion Ej: about/juan --> ['about', 'juan']
$params = explode('/', $action); // genera un arreglo
    

switch ($params[0]) {
    case 'Home':
        $controllerHome = new HomeController();
        $controllerHome->showHome();
        break;
    case 'Login':
        $controllerAuth = new AuthController();
        $controllerAuth->showFormLogin();
        break;
    case 'Validar_Usuario':
        $controllerAuth = new AuthController();
        $controllerAuth->validateUser();
        break;
    case 'Logout':
        $controllerAuth = new AuthController();
        $controllerAuth->logout();
        break;
    case 'Tipos_Insumos':
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->showAllTiposInsumos();
        break;
    case 'Edit_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->showFormUpdateTipoInsumoById($id);
        break;
    case 'Update_Tipo_Insumo':
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->saveUpdateTipoInsumo();
        break;
    case 'Delete_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->deleteTipoInsumoById($id);
        break;
    case 'Add_Tipo_Insumo':
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->showFormAddTipoInsumo();
        break;
    case 'Save_Tipo_Insumo':
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->saveNewTipoInsumo();
        break;
    case 'View_Tipo_Insumo':
        $id = $params[1];
        $controllerTipoInsumo = new TipoInsumoController();
        $controllerTipoInsumo->showTipoInsumoById($id);
        break;
    case 'Insumos':
        $controllerInsumo = new InsumoController();
        $controllerInsumo->showAllInsumos();
        break;
    case 'Add_Insumo':
        $controllerInsumo = new InsumoController();
        $controllerInsumo->showFormAddInsumo();
        break;
    case 'Save_Insumo':
        $controllerInsumo = new InsumoController();
        $controllerInsumo->saveNewInsumo();
        break;
    case 'Edit_Insumo':
        $id = $params[1];
        $controllerInsumo = new InsumoController();
        $controllerInsumo->showFormUpdateInsumoById($id);
        break;
    case 'Update_Insumo':
        $controllerInsumo = new InsumoController();
        $controllerInsumo->saveUpdateInsumo();
        break;
    case 'Delete_Insumo':
        $id = $params[1];
        $controllerInsumo = new InsumoController();
        $controllerInsumo->deleteInsumoById($id);
        break;
    case 'View_Insumo':
        $id = $params[1];
        $controllerInsumo = new InsumoController();
        $controllerInsumo->showInsumo($id);
        break;
    case 'Filtrar_Tipo_Insumo':
        $controllerInsumo = new InsumoController();
        $controllerInsumo->showFilterByTipoInsumo();
        break;
    case 'Usuarios':
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->showAllUsuario();
        break;
    case 'Add_Usuario':
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->showFormAddUsuario();
        break;
    case 'Save_Usuario':
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->saveNewUsuario();
        break;
    case 'Delete_Usuario':
        $id = $params[1];
        $controllerUsuario = new UsuarioController(); 
        $controllerUsuario->deleteUsuarioById($id);
        break;
    case 'Edit_Usuario':
        $id = $params[1];
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->showFormUpdateUsuarioById($id);
        break;
    case 'Update_Usuario':
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->saveUpdateUsuario();
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo "404 not found";
        break;
}