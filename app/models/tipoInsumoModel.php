<?php

class tipoInsumoModel {

    /**
     * Conexion a base de datos
     */
    function conexion(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_insumos_agricolas;charset=utf8', 'root', '');
        return $db;
    }

    /**
     * Consulta para mostrar todos los tipos de insumos
     */
    function getAllTipoInsumo(){
        //1. abrimos la conexion
        $db = $this->conexion();
        //2. preparamos la consulta
        $query = $db->prepare("SELECT * FROM tipo_insumo");
        //3. ejecutamos la consulta
        $query->execute();
        //4. recuperamos los datos de la consulta
        $tiposInsumos = $query->fetchAll(PDO::FETCH_OBJ);
        return $tiposInsumos;
    }

    /**
     * Consulta por ID un determinado tipo de insumo
     */
    function getTipoInsumoById($id){
        //1. abrimos la conexion
        $db = $this->conexion();
        $query = $db->prepare("SELECT id_tipo_insumo, tipo_insumo FROM tipo_insumo WHERE id_tipo_insumo = ?");
        $query->execute([$id]);
        $tipoInsumo = $query->fetch(PDO::FETCH_OBJ);
        return $tipoInsumo;
    }

    /**
     * Agrega un nuevo Tipo de Insumo
     */
    function addTipoInsumo($tipo_insumo){
        //1. abrimos la conexion
        $db = $this->conexion();
        $query = $db->prepare("INSERT INTO tipo_insumo(tipo_insumo) VALUES (?)");
        $query->execute([$tipo_insumo]);    
    }

    /**
     * Elimina un tipo de insumo
     */
    function deleteTipoInsumoById($id_tipo_insumo){
        //1. abrimos la conexion
        $db = $this->conexion();
        $query = $db->prepare("DELETE FROM tipo_insumo WHERE id_tipo_insumo = ?");
        $query->execute([$id_tipo_insumo]);   
    }

    /**
     * Edita un tipo de insumo
     */
    function updateTipoInsumo($id_tipo_insumo, $tipo_insumo){
        //1. abrimos la conexion
        $db = $this->conexion();
        $query = $db->prepare("UPDATE tipo_insumo SET tipo_insumo = ? WHERE id_tipo_insumo = ?");
        $query->execute([$tipo_insumo, $id_tipo_insumo]);   
    }

}