<?php

class insumoModel {

    private $db;

    /**
     * Constructor de la clase insumoModel
     */
    function __construct() {
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
     * Consulta para mostrar todos los insumos
     */
    function getAll(){
        //2. preparamos la consulta
        // $query = $this->db->prepare("SELECT * FROM insumo");
        $query = $this->db->prepare("SELECT id_insumo, insumo, unidad_medida, id_tipo_insumo FROM insumo");
        $query->execute();
        // $insumos = $query->fetchAll(PDO::FETCH_ASSOC);
        $insumos = $query->fetchAll(PDO::FETCH_OBJ);
        return $insumos;
    }

    /**
     * Consulta por ID un determinado insumo
     */
    function getById($id){
        $query = $this->db->prepare("SELECT id_insumo, insumo, unidad_medida, id_tipo_insumo FROM insumo WHERE id_insumo = ?");
        $query->execute([$id]);
        $insumo = $query->fetch(PDO::FETCH_OBJ);
        return $insumo;
    }

    /**
     * Agrega un nuevo Insumo
     */
    function add($insumo, $unidad_medida, $id_tipo_insumo){
        $query = $this->db->prepare("INSERT INTO insumo (`insumo`, `unidad_medida`, `id_tipo_insumo`) VALUES (?, ?, ?)");
        $query->execute([$insumo, $unidad_medida, $id_tipo_insumo]);    
    }

    /**
     * Elimina un insumo
     */
    function delete($id_insumo){
        $query = $this->db->prepare("DELETE FROM insumo WHERE id_insumo = ?");
        $query->execute([$id_insumo]);   
    }

    /**
     * Edita un insumo
     */
    function update($id_insumo, $insumo, $unidad_medida, $id_tipo_insumo){
        $query = $this->db->prepare("UPDATE insumo SET insumo = ?,unidad_medida = ?, id_tipo_insumo = ? WHERE id_insumo = ?");
        $query->execute([$insumo, $unidad_medida, $id_tipo_insumo, $id_insumo]);   
    }

     /**
     * Consulta por ID un determinado tipo de insumo
     */
    function getByIdTipoInsumo($id_tipoInsumo){
        $query = $this->db->prepare("SELECT id_insumo, insumo, unidad_medida, id_tipo_insumo FROM insumo WHERE id_tipo_insumo = ?");
        $query->execute([$id_tipoInsumo]);
        $insumos = $query->fetchAll(PDO::FETCH_OBJ);
        return $insumos;
    }

}