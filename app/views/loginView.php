<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class loginView{

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
}