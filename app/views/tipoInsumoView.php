<?php


class tipoInsumoView{

    /**
     * Consulta para mostrar todos los tipos de insumos
     */
    function renderAllTiposInsumos($tiposInsumos){
        echo "<h1>Lista de Tipos de Insumos</h1>";
        // tabla de tipos de insumos
        echo "<table class='table'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Tipo de Insumo</th>
                <th>Acciones</th>
            </tr>
        <thead>
        <tbody>";

        foreach($tiposInsumos as $tipoInsumo) {
            echo "
                <tr>
                    <td>$tipoInsumo->id_tipo_insumo</td>
                    <td>$tipoInsumo->tipo_insumo</td>
                    <td>
                    <a href='Edit_Tipo_Insumo/$tipoInsumo->id_tipo_insumo' type='button' class='btn btn-primary ml-auto'>Editar</a> 
                    <a href='Delete_Tipo_Insumo/$tipoInsumo->id_tipo_insumo' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
                    </td>
                </tr>
            ";
            }
        echo " </tbody>   
        </table>";
    }
    
    /**
     * Muestra pantalla de error
     */
    function renderError($msg) {
        echo "<h1> Error! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Muestra pantalla de ejecutado correctamente
     */
    function renderOk($msg) {
        echo "<h1> Se ejecuto correctamente! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Muestra los datos de un insumo determinado, para poder editarlo
     */
    function renderTipoInsumoById($tipoInsumo) {
        include 'templates/form_alta_tipo_insumo.php';
        $id = $tipoInsumo->id_tipo_insumo;
        $tipoInsumo = $tipoInsumo->tipo_insumo;
        
    }

    /**
     * Render para agregar un tipo de insumo
     */
    function renderAddTipoInsumo() {
        include 'templates/form_alta_tipo_insumo.php';
    }
}
     
