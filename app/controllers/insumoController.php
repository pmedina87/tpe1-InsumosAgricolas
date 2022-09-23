<?php

require_once 'app/models/insumoModel.php';
require_once 'app/views/insumoView.php';

class insumoController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new insumoModel();
        $this->view = new insumoView();
    }

    function showAllInsumos(){
        $insumos = $this->model->getAll();
        // actualizo la vista
        $this->view->renderAllInsumos($insumos);
    }

    function showInsumoById($id){
        $insumo = $this->model->getById($id);
        // actualizo la vista
        $this->view->renderInsumoById($insumo);
    }

    function deleteInsumoById($id){
        $this->model->delete($id);
        $this->showAllInsumos();
        header("Location: " . BASE_URL . "Insumos"); 
        // var_dump($tipoInsumo);
        // actualizo la vista
        // $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function showFormAddInsumo(){
        $this->view->renderAddInsumo();
        // $this->showAllTiposInsumos();
        // header("Location: " . BASE_URL); 
        // var_dump($tipoInsumo);
        // actualizo la vista
        // $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function saveNewInsumo(){
        $insumo = $_POST['insumo'];
        $unidad_medida = $_POST['unidad_medida'];
        $tipo_insumo = $_POST['id_tipo_insumo'];
        if (empty($insumo)) {
            $msg = "Debe completar los datos obligatorios";
            $this->view->renderError($msg);
        }
        else {
            $this->model->add($insumo, $unidad_medida, $tipo_insumo);
            $this->showAllInsumos();
            header("Location: " . BASE_URL . "Insumos");
        }
    }
}
