<?php

require_once 'app/models/tipoInsumoModel.php';
require_once 'app/views/tipoInsumoView.php';

class tipoInsumoController{
    private $model;
    private $view;

    /**
     * Constructor de la clase tipoInsumoController
     */
    public function __construct() {
        $this->model = new tipoInsumoModel();
        $this->view = new tipoInsumoView();
    }

    /**
     * Funcion que muestra todos los tipos de insumos
     */
    function showAllTiposInsumos(){
        $tipoInsumos = $this->model->getAll();
        $this->view->renderAllTiposInsumos($tipoInsumos);
    }

    /**
     * Funcion que muestra el formulario para actualizar un tipo de insumo
     */
    function showFormUpdateTipoInsumoById($id){
        $tipoInsumo = $this->model->getById($id);
        $this->view->renderUpdateTipoInsumoById($tipoInsumo);
    }

    /**
     * Funcion que elimina a un tipo de insumo
     */
    function deleteTipoInsumoById($id){
        $this->model->delete($id);
        $this->showAllTiposInsumos();
        header("Location: " . BASE_URL . "Tipos_Insumos"); 
    }

    /**
     * Funcion que muestra el formulario para agregar un nuevo tipo de insumo
     */
    function showFormAddTipoInsumo(){
        $this->view->renderAddTipoInsumo();
    }

    /**
     * Funcion que guarda un nuevo tipo de insumo
     */
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

    /**
     * Funcion que guarda la actualizacion de tipo de insumo
     */
    function saveUpdateTipoInsumo(){
        $id = $_POST['id'];
        $tipo_insumo = $_POST['tipo_insumo'];
        if (!empty($tipo_insumo)) {
            $this->model->update($id, $tipo_insumo);
            $this->showAllTiposInsumos();
            header("Location: " . BASE_URL . "Tipos_Insumos");
        }
        else {
            $msg = "Debe completar los datos obligatorios";
            $this->view->renderError($msg);
        }
                
    }
}
