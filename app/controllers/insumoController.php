<?php

require_once 'app/models/insumoModel.php';
require_once 'app/models/tipoInsumoModel.php';
require_once 'app/views/insumoView.php';
require_once 'app/views/messageView.php';

class insumoController{
    private $insumoModel;
    private $tipoInsumoModel;
    private $insumoView;
    private $messageView;

    /**
     * Constructor de la clase insumoController 
    */
    public function __construct() {
        $this->insumoModel = new insumoModel();
        $this->tipoInsumoModel = new tipoInsumoModel();
        $this->insumoView = new insumoView();
        $this->messageView = new messageView();
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
        if ((!empty($insumo)) || (!empty($unidad_medida)) || (!empty($id_tipo_insumo))){
            $this->insumoModel->add($insumo, $unidad_medida, $id_tipo_insumo);
            header("Location: " . BASE_URL . "Insumos");
        }
        else {
            $titulo = "Error!";
            $msg = "Debe completar los datos obligatorios";
            $redireccion = "Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);
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
            $titulo = "Error!";
            $msg = "Debe completar los datos obligatorios";
            $redireccion = "Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);
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
        if ($id_tipoInsumo != 0) {
            $insumos = $this->insumoModel->getByIdTipoInsumo($id_tipoInsumo);
            $tiposInsumos = $this->tipoInsumoModel->getAll();
            $this->insumoView->renderAllInsumos($insumos, $tiposInsumos);
        }
        else {
            $titulo = "Error!";
            $msg = "Debe seleccionar un tipo de insumo para poder filtrar";
            $redireccion = "Insumos";
            $this->messageView->message($titulo, $msg, $redireccion);
        }
    }
}
