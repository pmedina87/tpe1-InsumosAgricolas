{include file="header.tpl"}

{include file="navBar.tpl"}


<h2 class="m-4">{$titulo}</h2>
    <form action="{$action}" method="POST">
        {if $action == "Update_Insumo"}
            <div class="m-4">
                <input type="number" id="id" name="id" value="{$id}" hidden>
            </div>
            <div class="m-4">
                <label for="insumo">Insumo:</label>
                <input type="text" id="insumo" name="insumo" value="{$insumo}">
            </div>
            <div class="m-4">
                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="{$unidad_medida}">
            </div>
            <div class="m-4">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="hidden" name="tipo_insumo">
                <select id = "tipo_insumo" name = "tipo_insumo">
                    {foreach from=$tiposInsumos item=$tipoInsumo}
                        {if $tipoInsumo->id_tipo_insumo == $idTipoInsumo}
                            <option value="{$tipoInsumo->id_tipo_insumo}">
                            {$tipoInsumo->tipo_insumo}</option>
                        {/if}        
                    {/foreach}            
                    {foreach from=$tiposInsumos item=$tipoInsumo}
                        <option value="{$tipoInsumo->id_tipo_insumo}">{$tipoInsumo->tipo_insumo}</option>
                    {/foreach}
                </select>
            </div>
        {elseif $action == "Save_Insumo"}    
            <div class="m-4">
                <input type="number" id="id" name="id" value="" hidden>
            </div>
            <div class="m-4">
                <label for="insumo">Insumo:</label>
                <input type="text" id="insumo" name="insumo" value="">
            </div>
            <div class="m-4">
                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="">
            </div>
            <div class="m-4">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="hidden" name="tipo_insumo">
                <select id = "tipo_insumo" name = "tipo_insumo">
                    <option value="0">Seleccione Tipo de Insumo:</option>
                    {foreach from=$tiposInsumos item=$tipoInsumo}
                        <option value="{$tipoInsumo->id_tipo_insumo}">{$tipoInsumo->tipo_insumo}</option>
                    {/foreach}
                </select>
            </div>
        {/if}
        <div class="m-4">  
            <input type="submit" class="btn btn-success ml-auto" value="{$boton}">
            <a href="Insumos">
                <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
            </a>
        </div>

    </form>

{include file="footer.tpl"}
