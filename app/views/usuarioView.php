<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class usuarioView{

    private $smarty;

    /**
     * Constructor que instancia Smarty.
     */
    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function renderFormLogin() {
        $titulo = "Login";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->display('loginForm.tpl');
    }

    public function renderUsuariosList($usuarios) {
        $titulo = "Listado de Usuarios";
        $cantidad = count($usuarios);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('usuariosList.tpl');
    }

    public function renderFormAddUsuario() {
        $titulo = "Agregar un Usuario";
        $action = "Save_Usuario";
        $boton = "Guardar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('usuarioAdd_Update.tpl');
    }

    function showFormUpdateUsuarioById($usuario){
        $titulo = "Editar un Usuario";
        $action = "Update_Usuario";
        $boton = "Actualizar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('boton', $boton);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('usuarioAdd_Update.tpl');
    }

}