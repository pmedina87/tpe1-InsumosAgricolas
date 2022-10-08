<?php

class UsuarioModel {

    private $db;

    /**
     * Constructor de la clase usuarioModel
     */
    public function __construct() {
        //1. abrimos la conexion
        $this->db = $this->connection();
    }

    /**
     * Conexion a base de datos
     * Funcion privada para que nadie (que no este dentro de la misma clase), pueda acceder
     */
    private function connection(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_insumos_agricolas;charset=utf8', 'root', '');
        return $db;
    }

    /**
     * Consulta para mostrar todos los usuarios
     */
    function getAll(){
        $query = $this->db->prepare("SELECT * FROM usuario");
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    /**
     * Consulta por ID un determinado usuario
     */
    function getById($id){
        $query = $this->db->prepare("SELECT id_usuario, usuario, contrasenia, email, nombre_usuario, apellido_usuario FROM usuario WHERE id_usuario = ?");
        $query->execute([$id]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    /**
     * Agrega un nuevo Usuario
     */
    function add($nombre, $apellido, $email, $usuario, $pass_hash){
        $query = $this->db->prepare("INSERT INTO usuario(usuario, contrasenia, email, nombre_usuario, apellido_usuario) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$usuario, $pass_hash, $email, $nombre, $apellido]);   
    }

    /**
     * Elimina un usuario
     */
    function delete($idUsuario){
        $query = $this->db->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $query->execute([$idUsuario]);   
    }

    /**
     * Edita un usuario
     */
    function update($id_usuario, $nombre, $apellido, $email){
        $query = $this->db->prepare("UPDATE usuario SET nombre_usuario = ?, apellido_usuario = ?, email = ? WHERE id_usuario = ?");
        $query->execute([$nombre, $apellido, $email, $id_usuario]);   
    }

    /**
     * Devuelve un usuario segun el nombre de usuario
     */
    function getByUsername($user){
        $query = $this->db->prepare("SELECT id_usuario, usuario, contrasenia FROM usuario WHERE usuario = ?");
        $query->execute([$user]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

}



