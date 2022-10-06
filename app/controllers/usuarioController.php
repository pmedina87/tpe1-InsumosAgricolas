<?php


require_once 'app/models/usuarioModel.php';
require_once 'app/views/usuarioView.php';
require_once 'app/views/messageView.php';


class usuarioController{

    private $usuarioModel;
    private $usuarioView;
    private $messageView;


    public function __construct() {
        $this->usuarioModel = new usuarioModel();
        $this->usuarioView = new usuarioView();
        $this->messageView = new messageView();
    }

    function showFormLogin(){
        $this->usuarioView->renderFormLogin();
    }

    function showAllUsuario(){
        $usuarios = $this->usuarioModel->getAll();
        $this->usuarioView->renderUsuariosList($usuarios);
    }

    function showFormAddUsuario(){
        $this->usuarioView->renderFormAddUsuario();
    }

    function saveNewUsuario(){
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
                    return 0;
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

    function deleteUsuarioById($id){
        $this->usuarioModel->delete($id);
        header("Location: " . BASE_URL . "Usuarios");
    }

    function showFormUpdateUsuarioById($id){
        
    }
}