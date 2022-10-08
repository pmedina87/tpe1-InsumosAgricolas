<?php

class TipoInsumoModel {

    private $db;

    /**
     * Constructor de la clase tipoInsumoModel
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
     * Consulta para mostrar todos los tipos de insumos
     */
    function getAll(){
        $query = $this->db->prepare("SELECT * FROM tipo_insumo");
        $query->execute();
        $tiposInsumos = $query->fetchAll(PDO::FETCH_OBJ);
        return $tiposInsumos;
    }

    /**
     * Consulta por ID un determinado tipo de insumo
     */
    function getById($id){
        $query = $this->db->prepare("SELECT id_tipo_insumo, tipo_insumo FROM tipo_insumo WHERE id_tipo_insumo = ?");
        $query->execute([$id]);
        $tipoInsumo = $query->fetch(PDO::FETCH_OBJ);
        return $tipoInsumo;
    }

    /**
     * Agrega un nuevo Tipo de Insumo
     */
    function add($tipo_insumo){
        $query = $this->db->prepare("INSERT INTO tipo_insumo(tipo_insumo) VALUES (?)");
        $query->execute([$tipo_insumo]);    
    }

    /**
     * Elimina un tipo de insumo
     */
    function delete($id_tipo_insumo){
        $query = $this->db->prepare("DELETE FROM tipo_insumo WHERE id_tipo_insumo = ?");
        $query->execute([$id_tipo_insumo]);   
    }

    /**
     * Edita un tipo de insumo
     */
    function update($id_tipo_insumo, $tipo_insumo){
        $query = $this->db->prepare("UPDATE tipo_insumo SET tipo_insumo = ? WHERE id_tipo_insumo = ?");
        $query->execute([$tipo_insumo, $id_tipo_insumo]);   
    }

}