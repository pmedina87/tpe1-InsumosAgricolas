<?php

require_once 'app/views/homeView.php';

class homeController{
    private $homeView;

    /**
     * Constructor de la clase homeController 
    */
    public function __construct() {
        $this->homeView = new homeView();
    }

    /**
     * Funcion que muestra el Home
     */
    function showHome(){
        $this->homeView->renderHome();
    }
}