{include file="header.tpl"}

{include file="navBar.tpl"}


<h2 class="m-4">{$titulo}</h2>
    <form action="{$action}" method="POST">
        {if $action == "Update_Usuario"}
            <div>
            </div>
            
        {elseif $action == "Save_Usuario"}    
            <div class="m-4">
                <input type="number" id="id" name="id" value="" hidden>
            </div>
            <div class="m-4">
                <label for="nombre_usuario">Nombre:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" value="">
            </div>
            <div class="m-4">
                <label for="apellido_usuario">Apellido:</label>
                <input type="text" id="apellido_usuario" name="apellido_usuario" value="">
            </div>
            <div class="m-4">
                <label for="email_usuario">Correo Electronico:</label>
                <input type="email" id="email_usuario" name="email_usuario" value="">
            </div>
            <div class="m-4">
                <label for="usuario">Nombre de Usuario:</label>
                <input type="text" id="usuario" name="usuario" value="">
            </div>
            <div class="m-4">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="">
            </div>
        {/if}
        <div class="m-4">  
            <input type="submit" class="btn btn-success ml-auto" value="{$boton}">
            <a href="Usuarios">
                <input type="button" class="btn btn-danger ml-auto" value="Cancelar">
            </a>
        </div>

    </form>

{include file="footer.tpl"}
