

<h2 class="m-3">Alta de Insumo</h2>

<form action="Save_Insumo" method="POST">
    <div class="mb-3">
        <input type="text" id="id" name="id" value="" hidden>
    </div>
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
        <input type="text" id="tipo_insumo" name="tipo_insumo" value="">
    </div>
    <div class="m-3">
        <input type="submit" class='btn btn-success ml-auto' value="Agregar">
        <a href="Insumos">
            <input type="button" class='btn btn-danger ml-auto' value="Cancelar">
        </a>
    </div>
</form> 

<?php



