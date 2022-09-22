<?php

require_once 'tipoInsumoModel.php';
require_once 'tipoInsumoView.php';

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
        // var_dump($tipoInsumo);
        // actualizo la vista
        $this->view->renderTipoInsumoById($tipoInsumo);
    }

    function deleteTipoInsumoById($id){
        $this->model->deleteTipoInsumoById($id);
        $this->showAllTiposInsumos();
        // header("Location: " . BASE_URL); 
        // var_dump($tipoInsumo);
        // actualizo la vista
        // $this->view->renderTipoInsumoById($tipoInsumo);
    }
}
