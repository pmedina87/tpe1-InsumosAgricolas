<?php

/**
 * Conexion a base de datos
 */
function conexion(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_insumos_agricolas;charset=utf8', 'root', '');
    return $db;
}