<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class messageView{

    private $smarty;

    /**
     * Constructor que instancia Smarty.
     */
    public function __construct() {
        $this->smarty = new Smarty();
    }
   
    /**
     * Muestra pantalla de error
     */
    function message($titulo, $msg, $redireccion) {
        $boton = "Aceptar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('redireccion', $redireccion);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('msg.tpl');
    }
}