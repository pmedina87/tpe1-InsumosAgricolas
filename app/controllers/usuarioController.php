<?php

require_once 'app/models/usuarioModel.php';
require_once 'app/views/usuarioView.php';
require_once 'app/views/messageView.php';
require_once 'app/helpers/authHelper.php';


class UsuarioController{

    private $usuarioModel;
    private $usuarioView;
    private $messageView;
    private $authHelper;

    /**
     * Constructor de la clase usuarioController.
     */
    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
        $this->usuarioView = new UsuarioView();
        $this->messageView = new MessageView();
        $this->authHelper = new AuthHelper();            
    }

    /**
     * Funcion que muestra todos los usuarios.
     */
    function showAllUsuario(){
        $this->authHelper->checkSessionActive();
        $usuarios = $this->usuarioModel->getAll();
        $this->usuarioView->renderUsuariosList($usuarios);
    }

    /**
     * Funcion que muestra el formulario para agregar un nuevo usuario.
     */
    function showFormAddUsuario(){
        $this->authHelper->checkLoggedIn();
        $this->usuarioView->renderFormAddUsuario();
    }

    /**
     * Funcion que guarda los datos de un nuevo usuario.
     */
    function saveNewUsuario(){
        $this->authHelper->checkLoggedIn();
        $nombre = $_POST['nombre_usuario'];
        $apellido = $_POST['apellido_usuario'];
        $email = $_POST['email_usuario'];
        $usuario = $_POST['usuario'];
        $pass = $_POST['password'];
        if (!($nombre == "") && !($apellido == "") && !($email == "") && !($usuario == "") && !($pass == "")){
            $usuarios = $this->usuarioModel->getAll();
            $i = 0;
            while ($i < count($usuarios)) {
                if ($usuarios[$i]->usuario == $usuario || $usuarios[$i]->email == $email) {
                    $titulo = "Error!";
                    $msg = "El usuario ya se encuentra registrado";
                    $redireccion = "Usuarios";
                    $this->messageView->message($titulo, $msg, $redireccion);
                    break;
                }
                else {
                    $i++;
                }
            }
            $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
            $this->usuarioModel->add($nombre, $apellido, $email, $usuario, $pass_hash);
            $titulo = "Ok!";
            $msg = "Usuario registrado correctamente!";
            $redireccion = "Usuarios";
            $this->messageView->message($titulo, $msg, $redireccion);
        }
        else {
            $titulo = "Error!";
            $msg = "Debe completar los datos obligatorios";
            $redireccion = "Usuarios";
            $this->messageView->message($titulo, $msg, $redireccion);
        }
    }

    /**
     * Funcion que elimina a un usuario.
     */
    function deleteUsuarioById($id){
        $this->authHelper->checkLoggedIn();
        $this->usuarioModel->delete($id);
        header("Location: " . BASE_URL . "Usuarios");
    }

    /**
     * Funcion que muestra el formulario para actualizar los datos de un usuario.
     */
    function showFormUpdateUsuarioById($id){
        $this->authHelper->checkLoggedIn();
        $usuario = $this->usuarioModel->getById($id);
        $this->usuarioView->showFormUpdateUsuarioById($usuario);
    }

    /**
     * Funcion que guarda los datos actualizados de un usuario.
     */
    function saveUpdateUsuario(){
        $this->authHelper->checkLoggedIn();
        $id_usuario = $_POST['id'];
        $nombre = $_POST['nombre_usuario'];
        $apellido = $_POST['apellido_usuario'];
        $email = $_POST['email_usuario'];
        $this->usuarioModel->update($id_usuario, $nombre, $apellido, $email);
        header("Location: " . BASE_URL . "Usuarios");
    }
}