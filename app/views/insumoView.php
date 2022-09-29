<?php


class insumoView{

    /**
     * Funcion que renderiza una tabla con todos los insumos
     */
    function renderAllInsumos($insumos){
        echo "<h1 class='m-3'>Lista de Insumos</h1>";
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
                    <td>$insumo[id_insumo]</td>
                    <td>$insumo[insumo]</td>
                    <td>$insumo[unidad_medida]</td>
                    <td>$insumo[tipo_insumo]</td>
                    <td>
                    <a href='Edit_Insumo/$insumo[id_insumo]' type='button' class='btn btn-primary ml-auto'>Editar</a> 
                    <a href='Delete_Insumo/$insumo[id_insumo]' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
                    </td>
                </tr>
            ";
            }
        echo " </tbody>   
        </table>";
    }
    
    /**
     * Funcion que renderiza una pantalla de error, con un mensaje pasado por parametro
     */
    function renderError($msg) {
        echo "<h1> Error! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Funcion que renderiza una pantalla de ejecutado correctamente, con un mensaje pasado por parametro
     */
    function renderOk($msg) {
        echo "<h1> Se ejecuto correctamente! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Funcion que renderiza todos los datos de un insumo determinado, para poder editarlo
     */
    function renderInsumoById($insumo) {
        // include 'templates/form_alta_insumo.php';
        // $id = $insumo['id_insumo'];
        // $insumo = $insumo['insumo'];
        // $unidad_medida = $insumo['unidad_medida'];
        // $id_tipo_insumo = $insumo['id_tipo_insumo'];
        $id = $insumo->id_insumo;
        $insumo = $insumo->insumo;
        $unidad_medida = $insumo->unidad_medida;
        $id_tipo_insumo = $insumo->id_tipo_insumo;
        $tipo_insumo = $insumo->tipo_insumo;
        var_dump($unidad_medida);
        var_dump($tipo_insumo);
        var_dump($id_tipo_insumo);
        var_dump($id, $insumo, $unidad_medida, $id_tipo_insumo);
    }

    /**
     * Funcion que renderiza un formulario para agregar un nuevo insumo
     */
    function renderAddInsumo($tipos_insumos) {
        echo '<h2 class="m-3">Alta de Insumo</h2>

        <form action="Save_Insumo" method="POST">
            <div class="mb-3">
                <label for="insumo">Insumo:</label>
                <input type="text" id="insumo" name="insumo" value="">
            </div>
            <div class="mb-3">
                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="">
            </div>
            <div class="mb-3">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="hidden" name="tipo_insumo">
                    <select id = "tipo_insumo" name = "tipo_insumo">
                        <option value="0">Seleccione Tipo de Insumo:</option>';
                            foreach ($tipos_insumos as $tipo) {
                                echo '<option value="'.$tipo->id_tipo_insumo.'">'.$tipo->tipo_insumo.'</option>';
                            }
                    echo '</select>
            </div>
            <div class="m-3">
                <input type="submit" class="btn btn-success ml-auto" value="Agregar">
                <a href="Insumos">
                    <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
                </a>
            </div>
        </form>'; 
    }
}
     
