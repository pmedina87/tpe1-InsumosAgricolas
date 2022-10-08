<?php

require_once 'app/views/homeView.php';
require_once 'app/helpers/authHelper.php';

class HomeController{
    private $homeView;
    private $authHelper;


    /**
     * Constructor de la clase HomeController 
    */
    public function __construct() {
        $this->homeView = new HomeView();
        $this->authHelper = new AuthHelper();
    }

    /**
     * Funcion que muestra el Home
     */
    function showHome(){
        $this->authHelper->checkSessionActive();
        $this->homeView->renderHome();
    }
}