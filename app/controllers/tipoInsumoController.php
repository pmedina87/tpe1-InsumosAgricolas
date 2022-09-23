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
        $tipoInsumos = $this->model->getAll();
        // actualizo la vista
        $this->view->renderAllTiposInsumos($tipoInsumos);
    }

    function showTipoInsumoById($id){
        $tipoInsumo = $this->model->getById($id);
        // actualizo la vista
        $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function deleteTipoInsumoById($id){
        $this->model->delete($id);
        $this->showAllTiposInsumos();
        header("Location: " . BASE_URL . "Tipos_Insumos"); 
        // var_dump($tipoInsumo);
        // actualizo la vista
        // $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function showFormAddTipoInsumo(){
        $this->view->renderAddTipoInsumo();
        // $this->showAllTiposInsumos();
        // header("Location: " . BASE_URL); 
        // var_dump($tipoInsumo);
        // actualizo la vista
        // $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function saveNewTipoInsumo(){
        $tipo_insumo = $_POST['tipo_insumo'];
        if (empty($tipo_insumo)) {
            $msg = "Debe completar los datos obligatorios";
            $this->view->renderError($msg);
        }
        else {
            $this->model->add($tipo_insumo);
            $this->showAllTiposInsumos();
            header("Location: " . BASE_URL . "Tipos_Insumos");
        }
    }
}
