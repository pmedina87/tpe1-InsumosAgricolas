<?php

require_once 'app/models/tipoInsumoModel.php';
require_once 'app/views/tipoInsumoView.php';

class tipoInsumoController{
    private $tipoInsumoModel;
    private $tipoInsumoView;

    /**
     * Constructor de la clase tipoInsumoController
     */
    public function __construct() {
        $this->tipoInsumoModel = new tipoInsumoModel();
        $this->tipoInsumoView = new tipoInsumoView();
    }

    /**
     * Funcion que muestra todos los tipos de insumos
     */
    function showAllTiposInsumos(){
        $tipoInsumos = $this->tipoInsumoModel->getAll();
        $this->tipoInsumoView->renderAllTiposInsumos($tipoInsumos);
    }

    /**
     * Funcion que muestra un tipo de insumo por ID
     */
    function showTipoInsumo($id){
        $tipoInsumo = $this->tipoInsumoModel->getById($id);
        return $tipoInsumo;
    }

    /**
     * Funcion que muestra el formulario para actualizar un tipo de insumo
     */
    function showFormUpdateTipoInsumoById($id){
        $tipoInsumo = $this->tipoInsumoModel->getById($id);
        $this->tipoInsumoView->renderUpdateTipoInsumoById($tipoInsumo);
    }

    /**
     * Funcion que elimina a un tipo de insumo
     */
    function deleteTipoInsumoById($id){
        $this->tipoInsumoModel->delete($id);
        header("Location: " . BASE_URL . "Tipos_Insumos"); 
    }

    /**
     * Funcion que muestra el formulario para agregar un nuevo tipo de insumo
     */
    function showFormAddTipoInsumo(){
        $this->tipoInsumoView->renderAddTipoInsumo();
    }

    /**
     * Funcion que guarda un nuevo tipo de insumo
     */
    function saveNewTipoInsumo(){
        $tipo_insumo = $_POST['tipo_insumo'];
        if (empty($tipo_insumo)) {
            $msg = "Debe completar los datos obligatorios";
            $this->tipoInsumoView->renderError($msg);
        }
        else {
            $this->tipoInsumoModel->add($tipo_insumo);
            header("Location: " . BASE_URL . "Tipos_Insumos");
        }
    }

    /**
     * Funcion que guarda la actualizacion de tipo de insumo
     */
    function saveUpdateTipoInsumo(){
        $id = $_POST['id'];
        $tipo_insumo = $_POST['tipo_insumo'];
        if (!empty($tipo_insumo)) {
            $this->tipoInsumoModel->update($id, $tipo_insumo);
            header("Location: " . BASE_URL . "Tipos_Insumos");
        }
        else {
            $msg = "Debe completar los datos obligatorios";
            $this->tipoInsumoView->renderError($msg);
        }         
    }

    /**
     * Funcion que muestra el detalle de un insumo especifico
     */
    function showTipoInsumoById($id){
        $tipoInsumo = $this->showTipoInsumo($id);
        $this->tipoInsumoView->renderDetailTipoInsumo($tipoInsumo);        
    }
}
