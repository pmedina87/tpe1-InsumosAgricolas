{include file="header.tpl"}

{include file="navBar.tpl"}


<h1  class='m-4'>{$titulo}</h1>

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
                <td>{$insumo['id_insumo']}</td>
                <td>{$insumo['insumo']}</td>
                <td>{$insumo['unidad_medida']}</td>
                <td>{$insumo['tipo_insumo']}</td>
                <td>
                    <a href='View_Insumo/{$insumo['id_insumo']}' type='button' class='btn btn-primary ml-auto'>Ver</a>
                    <a href='Edit_Insumo/{$insumo['id_insumo']}' type='button' class='btn btn-success ml-auto'>Editar</a> 
                    <a href='Delete_Insumo/{$insumo['id_insumo']}' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
                </td>
            </tr>
        {/foreach}
    </tbody>   
</table>

{include file="footer.tpl"}