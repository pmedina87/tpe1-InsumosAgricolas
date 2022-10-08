<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function renderFormLogin() {
        $titulo = "Login";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->display('loginForm.tpl');
    }
}