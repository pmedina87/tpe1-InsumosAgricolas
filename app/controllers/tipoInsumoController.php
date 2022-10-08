<?php

require_once 'app/models/tipoInsumoModel.php';
require_once 'app/models/insumoModel.php';
require_once 'app/views/tipoInsumoView.php';
require_once 'app/views/messageView.php';

class TipoInsumoController{
    private $tipoInsumoModel;
    private $insumoModel;
    private $tipoInsumoView;
    private $messageView;
    private $authHelper;

    /**
     * Constructor de la clase tipoInsumoController
     */
    public function __construct() {
        $this->tipoInsumoModel = new TipoInsumoModel();
        $this->insumoModel = new InsumoModel();
        $this->tipoInsumoView = new TipoInsumoView();
        $this->messageView = new MessageView();
        $this->authHelper = new AuthHelper();
    }

    /**
     * Funcion que muestra todos los tipos de insumos
     */
    function showAllTiposInsumos(){
        $this->authHelper->checkSessionActive();
        $tipoInsumos = $this->tipoInsumoModel->getAll();
        $this->tipoInsumoView->renderAllTiposInsumos($tipoInsumos);
    }

    /**
     * Funcion que muestra un tipo de insumo por ID
     */
    function showTipoInsumo($id){
        $this->authHelper->checkSessionActive();
        $tipoInsumo = $this->tipoInsumoModel->getById($id);
        return $tipoInsumo;
    }

    /**
     * Funcion que muestra el formulario para actualizar un tipo de insumo
     */
    function showFormUpdateTipoInsumoById($id){
        $this->authHelper->checkLoggedIn();
        $tipoInsumo = $this->tipoInsumoModel->getById($id);
        $this->tipoInsumoView->renderUpdateTipoInsumoById($tipoInsumo);
    }

    /**
     * Funcion que elimina a un tipo de insumo
     */
    function deleteTipoInsumoById($id){
        $this->authHelper->checkLoggedIn();
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
        $this->authHelper->checkLoggedIn();
        $this->tipoInsumoView->renderAddTipoInsumo();
    }

    /**
     * Funcion que guarda un nuevo tipo de insumo
     */
    function saveNewTipoInsumo(){
        $this->authHelper->checkLoggedIn();
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
        $this->authHelper->checkLoggedIn();
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
        $this->authHelper->checkSessionActive();
        $tipoInsumo = $this->showTipoInsumo($id);
        $this->tipoInsumoView->renderDetailTipoInsumo($tipoInsumo);        
    }
}
