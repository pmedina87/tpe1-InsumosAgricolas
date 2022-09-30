{include file="header.tpl"}

{include file="navBar.tpl"}


<h2 class="m-4">{$titulo}</h2>
    <form action="{$action}" method="POST">
        {if $action == "Update_Tipo_Insumo"}
            <div class="m-4">
                <input type="number" id="id" name="id" value="{$id}" hidden>
            </div>
            <div class="m-4">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="text" id="tipo_insumo" name="tipo_insumo" value="{$tipoInsumo}">
            </div>
        {elseif $action == "Save_Tipo_Insumo"}    
            <div class="m-4">
                <input type="number" id="id" name="id" value="" hidden>
            </div>
            <div class="m-4">
                <label for="tipo_insumo">Tipo de Insumo:</label>
                <input type="text" id="tipo_insumo" name="tipo_insumo" value="">
            </div>
        {/if}
        <div class="m-4">  
            <input type="submit" class="btn btn-success ml-auto" value="{$boton}">
            <a href="Tipos_Insumos">
                <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
            </a>
        </div>

    </form>

{include file="footer.tpl"}
