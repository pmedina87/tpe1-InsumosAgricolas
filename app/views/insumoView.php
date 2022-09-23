<?php


class insumoView{

    /**
     * Consulta para mostrar todos los insumos
     */
    function renderAllInsumos($insumos){
        echo "<h1>Lista de Insumos</h1>";
        // tabla de tipos de insumos
        echo "<table class='table'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Insumo</th>
                <th>Unidad de Medida</th>
                <th>Tipo de Insumo</th>
                <th>Acciones</th>
            </tr>
        <thead>
        <tbody>";

        foreach($insumos as $insumo) {
            echo "
                <tr>
                    <td>$insumo->id_insumo</td>
                    <td>$insumo->insumo</td>
                    <td>$insumo->unidad_medida</td>
                    <td>$insumo->id_tipo_insumo</td>
                    <td>
                    <a href='Edit_Insumo/$insumo->id_insumo' type='button' class='btn btn-primary ml-auto'>Editar</a> 
                    <a href='Delete_Insumo/$insumo->id_insumo' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
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
    function renderInsumoById($insumo) {
        include 'templates/form_alta_insumo.php';
        $id = $insumo->id_insumo;
        $insumo = $insumo->insumo;
        $unidad_medida = $insumo->unidad_medida;
        $id_tipo_insumo = $insumo->id_tipo_insumo;
        
    }

    /**
     * Render para agregar un insumo
     */
    function renderAddInsumo() {
        include 'templates/form_alta_insumo.php';
    }
}
     
