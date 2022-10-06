{include file="header.tpl"}

{include file="navBar.tpl"}

<div class="m-4 border red 5px solid">
    <h1  class='m-4'>{$titulo}</h1>
        <div class="m-4">
            <p>{$msg}</p> 
        </div>
    <a href='{$redireccion}' type='button' class='btn btn-secondary ml-auto m-4'>{$boton}</a>

</div>

{include file="footer.tpl"}