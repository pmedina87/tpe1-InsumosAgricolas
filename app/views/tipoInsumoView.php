<?php


class tipoInsumoView{

    /**
     * Consulta para mostrar todos los tipos de insumos
     */
    function renderAllTiposInsumos($tiposInsumos){
        echo "<h1  class='m-3'>Lista de Tipos de Insumos</h1>";
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
    function renderUpdateTipoInsumoById($tipoInsumo) {
        $id = $tipoInsumo->id_tipo_insumo;
        $tipoInsumo = $tipoInsumo->tipo_insumo;
        echo '<h2 class="m-3">Actualizar Tipo Insumo</h2>

        <form action="Update_Tipo_Insumo" method="POST">
            <div class="m-3">
                <input type="number" id="id" name="id" value="'.$id.'" hidden>
            </div>
            <div class="m-3">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="text" id="tipo_insumo" name="tipo_insumo" value="'.$tipoInsumo.'">
            </div>
            <div class="m-3">  
                <input type="submit" class="btn btn-success ml-auto" value="Actualizar">
                <a href="Tipos_Insumos">
                    <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
                </a>
            </div>

        </form>';        
    }

    /**
     * Render para agregar un tipo de insumo
     */
    function renderAddTipoInsumo() {

        echo '<h2 class="m-3">Alta Tipo Insumo</h2>

        <form action="Save_Tipo_Insumo" method="POST">
            <div class="m-3">
                <input type="text" id="id" name="id" value="" hidden>
            </div>
            <div class="m-3">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="text" id="tipo_insumo" name="tipo_insumo" value="">
            </div>
            <div class="m-3">  
                <input type="submit" class="btn btn-success ml-auto" value="Agregar">
                <a href="Tipos_Insumos">
                    <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
                </a>
            </div>

        </form>';
        // include 'templates/form_alta_tipo_insumo.php';
    }
}
     
