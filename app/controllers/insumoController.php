<?php

require_once 'app/models/insumoModel.php';
require_once 'app/views/insumoView.php';

class insumoController{
    private $model;
    private $view;

    /**
     * Constructor de la clase insumoController 
    */
    public function __construct() {
        $this->model = new insumoModel();
        $this->view = new insumoView();
    }

    /**
     * Funcion que muestra todos los insumos
     */
    function showAllInsumos(){
        $insumos = $this->model->getAll();
        $this->view->renderAllInsumos($insumos);
    }

    /**
     * Funcion que muestra un insumo especifico
     */
    function showInsumoById($id){
        $insumo = $this->model->getById($id);
        $this->view->renderInsumoById($insumo);
    }

    /**
     * Funcion que elimina un insumo
     */
    function deleteInsumoById($id){
        $this->model->delete($id);
        $this->showAllInsumos();
        header("Location: " . BASE_URL . "Insumos"); 
    }

    /**
     * Funcion que muestra el formulario para agregar un nuevo insumo
     */
    function showFormAddInsumo(){
        require_once 'app/models/tipoInsumoModel.php';
        $controllerTipoInsumo = new tipoInsumoModel();
        $tipos_insumos = $controllerTipoInsumo->getAll();
        $this->view->renderAddInsumo($tipos_insumos);
    }

    /**
     * Funcion que guarda un nuevo insumo
     */
    function saveNewInsumo(){
        $insumo = $_POST['insumo'];
        $unidad_medida = $_POST['unidad_medida'];
        $id_tipo_insumo = intval($_POST['tipo_insumo']);
        var_dump($id_tipo_insumo);
        if ((empty($insumo)) || (empty($unidad_medida)) || (empty($id_tipo_insumo))){
            $msg = "Debe completar los datos obligatorios";
            $this->view->renderError($msg);
        }
        else {
            $this->model->add($insumo, $unidad_medida, $id_tipo_insumo);
            $this->showAllInsumos();
            header("Location: " . BASE_URL . "Insumos");
        }
    }
}
