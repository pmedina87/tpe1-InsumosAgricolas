{include file="header.tpl"}

{include file="navBar.tpl"}


<h1  class='m-4'>{$titulo}</h1>

<div class= "tabla">
    <table class='table m-4'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electronico</th>
                <th>Acciones</th>
            </tr>
        <thead>
        <tbody>

            {foreach from=$usuarios item=$usuario}
                <tr>
                    <td>{$usuario->id_usuario}</td>
                    <td>{$usuario->nombre_usuario}</td>
                    <td>{$usuario->apellido_usuario}</td>
                    <td>{$usuario->email}</td>
                    <td>
                        {if isset($smarty.session.USER_ID)}
                            <a href='Edit_Usuario/{$usuario->id_usuario}' type='button' class='btn btn-success ml-auto'>Editar</a> 
                            <a href='Delete_Usuario/{$usuario->id_usuario}' type='button' class='btn btn-danger ml-auto'>Eliminar</a>
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
        <a href="Add_Usuario">
        <button class='btn btn-primary ml-auto' type="button">Agregar Usuario</button>
        </a>
    </div>
{/if} 

{include file="footer.tpl"}