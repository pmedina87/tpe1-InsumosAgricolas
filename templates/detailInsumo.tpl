{include file="header.tpl"}

<div class="m-4 border red 5px solid">
    <h1  class='m-4'>{$titulo}</h1>
        <div class="m-4">
            <li><span>INSUNO: </span> {$insumo}</li>
            <li><span>UNIDAD DE MEDIDA: </span> {$unidadMedida}</li>
            {foreach from=$tiposInsumos item=$tipoInsumo}
                {if $tipoInsumo->id_tipo_insumo == $idTipoInsumo}
                    <li><span>TIPO DE INSUMO: </span>{$tipoInsumo->tipo_insumo}</li>
                {/if}
            {/foreach}
            <img src="assets\img\insumos.jpg" alt="insumos" srcset="">
        </div>
    <a href='Insumos' type='button' class='btn btn-danger ml-auto m-4'>{$boton}</a>

</div>