<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class insumoView{

    private $smarty;

    /**
     * Constructor que instancia Smarty.
     */
    public function __construct() {
        $this->smarty = new Smarty();
    }

    /**
     * Funcion que renderiza una tabla con todos los insumos
     */
    function renderAllInsumos($insumos, $tiposInsumos){
        $cant_elementos = count($insumos);
        $titulo = "Listado de Insumos";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('insumos', $insumos);
        $this->smarty->assign('tiposInsumos', $tiposInsumos);
        $this->smarty->assign('cantidad', $cant_elementos);
        $this->smarty->display('insumosList.tpl');
    }
    
    /**
     * Funcion que renderiza una pantalla de error, con un mensaje pasado por parametro
     */
    function renderError($msg) {
        echo "<h1> Error! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Funcion que renderiza una pantalla de ejecutado correctamente, con un mensaje pasado por parametro
     */
    function renderOk($msg) {
        echo "<h1> Se ejecuto correctamente! </h1>";
        echo "<h2> $msg </h2>";
    }

    /**
     * Funcion que renderiza todos los datos de un insumo determinado, para poder editarlo
     */
    function renderFormUpdateInsumoById($insumo, $tipos_Insumos) {
        $titulo = "Actualizar Insumo";
        $action = "Update_Insumo";
        $id = $insumo->id_insumo;
        $insumo_nombre = $insumo->insumo;
        $unidad_medida = $insumo->unidad_medida;
        $id_tipoInsumo = $insumo->id_tipo_insumo;
        $boton = "Actualizar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('insumo', $insumo_nombre);
        $this->smarty->assign('unidad_medida', $unidad_medida);
        $this->smarty->assign('idTipoInsumo', $id_tipoInsumo);
        $this->smarty->assign('tiposInsumos', $tipos_Insumos);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('insumoAdd_Update.tpl');
    }

    /**
     * Funcion que renderiza un formulario para agregar un nuevo insumo
     */
    function renderAddInsumo($tipos_insumos) {
        $titulo = "Alta de Insumo";
        $action = "Save_Insumo";
        $boton = "Guardar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('action', $action);
        $this->smarty->assign('tiposInsumos', $tipos_insumos);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('insumoAdd_Update.tpl');
    }

    /**
     * Funcion que renderiza un detalle de un insumo especifico
     */
    function renderDetailInsumo($insumo, $tiposInsumos) {
        $titulo = "Detalle de Insumo";
        $nombre = $insumo->insumo;
        $unidad_medida = $insumo->unidad_medida;
        $id_tipo_insumo = $insumo->id_tipo_insumo;
        $boton = "Cerrar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('insumo', $nombre);
        $this->smarty->assign('unidadMedida', $unidad_medida);
        $this->smarty->assign('idTipoInsumo', $id_tipo_insumo);
        $this->smarty->assign('tiposInsumos', $tiposInsumos);
        $this->smarty->assign('boton', $boton);
        $this->smarty->display('detailInsumo.tpl');
    }
}
     
