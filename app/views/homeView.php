<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class homeView{

    private $smarty;

    /**
     * Constructor que instancia Smarty.
     */
    public function __construct() {
        $this->smarty = new Smarty();
    }

    function renderHome(){
        $this->smarty->assign('titulo', "Home");
        $this->smarty->display('home.tpl');
    }

}