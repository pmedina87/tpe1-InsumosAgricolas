<?php
require_once './app/views/authView.php';
require_once './app/views/messageView.php';
require_once './app/models/usuarioModel.php';

class AuthController {
    private $authView;
    private $messageView;
    private $usuarioModel;
    
    public function __construct() {
        $this->authView = new AuthView();
        $this->messageView = new MessageView();
        $this->usuarioModel = new UsuarioModel();
    }

    /**
     * Funcion que muestra el formulario de login.
     */
    function showFormLogin(){
        $this->authView->renderFormLogin();
    }

    /**
     * Funcion que valida si el usuario ingresado existe, si es asi, crea una sesion.
     */
    function validateUser() {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $usuario = $this->usuarioModel->getByUsername($user);
        if ($usuario && password_verify($password, $usuario->contrasenia)) {
            session_start();
            $_SESSION['USER_ID'] = $usuario->id_usuario;
            $_SESSION['USER_NAME'] = $usuario->usuario;
            $_SESSION['IS_LOGGED'] = true;
            header("Location: " . BASE_URL);
        }
        else {
            $titulo = "Error!";
            $msg = "El usuario y password ingresados son incorrectos.";
            $redireccion = "Login";
           $this->messageView->message($titulo, $msg, $redireccion);
        } 
    }

    /**
     * Funcion que deslogea al usuario.
     */
    function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "Login");
    }
}