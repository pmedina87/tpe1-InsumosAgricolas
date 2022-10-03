<?php

require_once 'app/models/insumoModel.php';
require_once 'app/views/insumoView.php';
require_once 'app/models/tipoInsumoModel.php';

class insumoController{
    private $insumoModel;
    private $insumoView;
    private $tipoInsumoModel;

    /**
     * Constructor de la clase insumoController 
    */
    public function __construct() {
        $this->insumoModel = new insumoModel();
        $this->insumoView = new insumoView();
        $this->tipoInsumoModel = new tipoInsumoModel();
    }

    /**
     * Funcion que muestra todos los insumos
     */
    function showAllInsumos(){
        $insumos = $this->insumoModel->getAll();
        $tiposInsumos = $this->tipoInsumoModel->getAll();
        $this->insumoView->renderAllInsumos($insumos, $tiposInsumos);
    }

    /**
     * Funcion que muestra un insumo especifico
     */
    function showInsumoById($id){
        $insumo = $this->insumoModel->getById($id);
        return $insumo;
    }


    /**
     * Funcion que muestra un insumo especifico para actualizarlo
     */
    function showFormUpdateInsumoById($id){
        $insumo = $this->showInsumoById($id);
        $tipoInsumo = $this->tipoInsumoModel->getAll();
        $this->insumoView->renderFormUpdateInsumoById($insumo, $tipoInsumo);
    }

    /**
     * Funcion que elimina un insumo
     */
    function deleteInsumoById($id){
        $this->insumoModel->delete($id);
        header("Location: " . BASE_URL . 'Insumos'); 
    }

    /**
     * Funcion que muestra el formulario para agregar un nuevo insumo
     */
    function showFormAddInsumo(){
        $tipos_insumos = $this->tipoInsumoModel->getAll();
        $this->insumoView->renderAddInsumo($tipos_insumos);
    }

    /**
     * Funcion que guarda un nuevo insumo
     */
    function saveNewInsumo(){
        $insumo = $_POST['insumo'];
        $unidad_medida = $_POST['unidad_medida'];
        $id_tipo_insumo = intval($_POST['tipo_insumo']);
        if ((empty($insumo)) || (empty($unidad_medida)) || (empty($id_tipo_insumo))){
            $msg = "Debe completar los datos obligatorios";
            $this->insumoView->renderError($msg);
        }
        else {
            $this->insumoModel->add($insumo, $unidad_medida, $id_tipo_insumo);
            header("Location: " . BASE_URL . "Insumos");
        }
    }

    /**
     * Funcion que guarda la actualizacion de tipo de insumo
     */
    function saveUpdateInsumo(){
        $id = $_POST['id'];
        $insumo = $_POST['insumo'];
        $unidad_medida = $_POST['unidad_medida'];
        $id_tipo_insumo = intval($_POST['tipo_insumo']);
        if (!empty($insumo)) {
            $this->insumoModel->update($id, $insumo, $unidad_medida, $id_tipo_insumo);
            header("Location: " . BASE_URL . "Insumos");
        }
        else {
            $msg = "Debe completar los datos obligatorios";
            $this->insumoView->renderError($msg);
        }         
    }

    /**
     * Funcion que muestra el detalle de un insumo especifico
     */
    function showInsumo($id){
        $insumo = $this->showInsumoById($id);
        $tiposInsumos = $this->tipoInsumoModel->getAll();
        $this->insumoView->renderDetailInsumo($insumo, $tiposInsumos);        
    }

    /**
     * Funcion que filtra insumo segun el tipo
     */
    function showFilterByTipoInsumo() {
        $id_tipoInsumo = $_POST['tipo_insumo'];
        $insumos = $this->insumoModel->getByIdTipoInsumo($id_tipoInsumo);
        $tiposInsumos = $this->tipoInsumoModel->getAll();
        $this->insumoView->renderAllInsumos($insumos, $tiposInsumos);
    }
}
