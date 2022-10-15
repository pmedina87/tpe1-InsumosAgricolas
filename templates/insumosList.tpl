{include file="header.tpl"}

{include file="navBar.tpl"}


<h1  class='m-4'>{$titulo}</h1>

<div class='m-4'>
    <form action="Filtrar_Tipo_Insumo" method="POST" 
        <label for="tipo_insumo">Filtrar por Tipo de Insumo:</label>
        <input type="hidden" name="tipo_insumo">
        <select id = "tipo_insumo" name = "tipo_insumo">
            <option value="0">Seleccione: </option>
            {foreach from=$tiposInsumos item=$tipoInsumo}
                <option value="{$tipoInsumo->id_tipo_insumo}">{$tipoInsumo->tipo_insumo}</option>
            {/foreach}
        </select>
        <input type="submit" class="btn btn-success ml-auto" value="Filtrar">
    </form>   
</div>

<div class='tabla'>
    <table class='table m-4'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Insumo</th>
                <th>Unidad de Medida</th>
                <th>Tipo de Insumo</th>
                <th>Acciones</th>
            </tr>
        <thead>
        <tbody>

            {foreach from=$insumos item=$insumo}
                <tr>
                    <td>{$insumo->id_insumo}</td>
                    <td>{$insumo->insumo}</td>
                    <td>{$insumo->unidad_medida}</td>
                    {foreach from=$tiposInsumos item=$tipoInsumo}
                        {if $insumo->id_tipo_insumo == $tipoInsumo->id_tipo_insumo}
                            <td>{$tipoInsumo->tipo_insumo}</td>
                        {/if}
                    {/foreach}
                    <td>
                        <a href='View_Insumo/{$insumo->id_insumo}' type='button' class='btn btn-primary ml-auto'>Ver</a>
                        {if isset($smarty.session.USER_ID)}
                            <a href='Edit_Insumo/{$insumo->id_insumo}' type='button' class='btn btn-success ml-auto'>Editar</a> 
                            <a href='Delete_Insumo/{$insumo->id_insumo}' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>   
    </table>
</div>

<div class='m-4'>
    {if $cantidad > 1}
        <p>Mostrando {$cantidad} registros </p>
    {elseif $cantidad == 1}
        <p>Mostrando {$cantidad} registro </p>
    {else}
        <p>No hay registros para mostrar </p>
    {/if}
</div>

{if isset($smarty.session.USER_ID)}
    <div class="m-4">
        <a href="Add_Insumo">
        <button class='btn btn-primary ml-auto' type="button">Agregar Insumo</button>
        </a>
    </div> 
{/if}
{include file="footer.tpl"}