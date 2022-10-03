{include file="header.tpl"}

{include file="navBar.tpl"}


<h1  class='m-4'>{$titulo}</h1>

<table class='table m-4'>
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Tipo de Insumo</th>
            <th>Acciones</th>
        </tr>
    <thead>
    <tbody>

        {foreach from=$tiposInsumos item=$tipoInsumo}
            <tr>
                <td>{$tipoInsumo->id_tipo_insumo}</td>
                <td>{$tipoInsumo->tipo_insumo}</td>
                <td>
                    <a href='View_Tipo_Insumo/{$tipoInsumo->id_tipo_insumo}' type='button' class='btn btn-primary ml-auto'>Ver</a>
                    <a href='Edit_Tipo_Insumo/{$tipoInsumo->id_tipo_insumo}' type='button' class='btn btn-success ml-auto'>Editar</a> 
                    <a href='Delete_Tipo_Insumo/{$tipoInsumo->id_tipo_insumo}' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
                </td>
            </tr>
        {/foreach}
    </tbody>   
</table>

<div class='m-4'>
    {if $cantidad > 1}
        <p>Mostrando {$cantidad} registros </p>
    {elseif $cantidad == 1}
        <p>Mostrando {$cantidad} registro </p>
    {else}
        <p>No hay registros para mostrar </p>
    {/if}
</div>

<div class="m-4">
    <a href="Add_Tipo_Insumo">
      <button class='btn btn-primary ml-auto' type="button">Agregar Tipo Insumo</button>
    </a>
</div> 

{include file="footer.tpl"}