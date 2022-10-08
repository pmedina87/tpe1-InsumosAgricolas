<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class TipoInsumoView{

    private $smarty;

    /**
     * Constructor que instancia Smarty.
     */
    public function __construct() {
        $this->smarty = new Smarty();
    }

    /**
     * Consulta para mostrar todos los tipos de insumos
     */
    function renderAllTiposInsumos($tiposInsumos){
        $cant_elementos = count($tiposInsumos);
        $this->smarty->assign('titulo', "Listado de Tipos de Insumos");
        $this->smarty->assign('tiposInsumos', $tiposInsumos);
        $this->smarty->assign('cantidad', $cant_elementos);
        $this->smarty->display('tiposInsumosList.tpl');
    }

    /**
     * Muestra los datos de un insumo determinado, para poder editarlo
     */
    function renderUpdateTipoInsumoById($tipoInsumo) {
        $titulo = "Actualizar Tipo de Insumo";
        $id = $tipoInsumo->id_tipo_insumo;
        $action = "Update_Tipo_Insumo";
        $tipoInsumo = $tipoInsumo->tipo_insumo;
        $boton = "Actualizar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('tipoInsumo', $tipoInsumo);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('tipoInsumoAdd_Update.tpl');        
    }

    /**
     * Render para agregar un tipo de insumo
     */
    function renderAddTipoInsumo() {
        $titulo = "Alta Tipo Insumo";
        $action = "Save_Tipo_Insumo";
        $boton = "Guardar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('tipoInsumoAdd_Update.tpl');
    }

    /**
     * Funcion que renderiza un detalle de un tipo de insumo especifico
     */
    function renderDetailTipoInsumo($tipoInsumo){
        $titulo = "Detalle de Tipo de Insumo";
        $nombre = $tipoInsumo->tipo_insumo;
        $boton = "Cerrar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('tipoInsumo', $nombre);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('detailTipoInsumo.tpl');
    }
}
     
