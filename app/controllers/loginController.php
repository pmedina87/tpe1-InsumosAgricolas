<?php


require_once 'app/views/loginView.php';


class loginController{

    private $loginView;

    public function __construct() {
        $this->loginView = new loginView();
    }

    public function showFormLogin(){
        $this->loginView->renderFormLogin();
    }
}