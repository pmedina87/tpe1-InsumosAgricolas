<?php

require_once 'app/models/tipoInsumoModel.php';
require_once 'app/models/insumoModel.php';
require_once 'app/views/tipoInsumoView.php';
require_once 'app/views/messageView.php';

class tipoInsumoController{
    private $tipoInsumoModel;
    private $insumoModel;
    private $tipoInsumoView;
    private $messageView;

    /**
     * Constructor de la clase tipoInsumoController
     */
    public function __construct() {
        $this->tipoInsumoModel = new tipoInsumoModel();
        $this->insumoModel = new insumoModel();
        $this->tipoInsumoView = new tipoInsumoView();
        $this->messageView = new messageView();
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
        $insumosAsocIdTipo = $this->insumoModel->getByIdTipoInsumo($id);
        if(count($insumosAsocIdTipo) == 0){
            $this->tipoInsumoModel->delete($id);
            header("Location: " . BASE_URL . "Tipos_Insumos"); 
        }
        else {
            $titulo = "Error!";
            $msg = "No se puede eliminar el registro, ya que se encuentra asociado a un item.";
            $redireccion = "Tipos_Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);; 
        }
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
        if (!empty($tipo_insumo)) {
            $this->tipoInsumoModel->add($tipo_insumo);
            header("Location: " . BASE_URL . "Tipos_Insumos");
        }
        else {
            $titulo = "Error!";
            $msg = "Debe completar los datos obligatorios";
            $redireccion = "Tipos_Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);;
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
            $titulo = "Error!";
            $msg = "Debe completar los datos obligatorios";
            $redireccion = "Tipos_Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);;
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
