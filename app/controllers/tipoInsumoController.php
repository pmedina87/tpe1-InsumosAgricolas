<?php

require_once 'app/models/tipoInsumoModel.php';
require_once 'app/views/tipoInsumoView.php';

class tipoInsumoController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new tipoInsumoModel();
        $this->view = new tipoInsumoView();
    }

    function showAllTiposInsumos(){
        $tipoInsumos = $this->model->getAllTipoInsumo();
        // actualizo la vista
        $this->view->renderAllTiposInsumos($tipoInsumos);
    }

    function showTipoInsumoById($id){
        $tipoInsumo = $this->model->getTipoInsumoById($id);
        // actualizo la vista
        $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function deleteTipoInsumoById($id){
        $this->model->deleteTipoInsumoById($id);
        $this->showAllTiposInsumos();
        header("Location: " . BASE_URL . "Tipos_Insumos"); 
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
        if (empty($_POST['tInsumo'])) {
            $msg = "Debe completar los datos obligatorios";
            $this->view->renderError($msg);
        }
        else {
            $tipo_insumo = $_POST['tInsumo'];
            $this->model->addTipoInsumo($tipo_insumo);
            $this->showAllTiposInsumos();
        }
        header("Location: " . BASE_URL . "Tipos_Insumos");
    }
}
