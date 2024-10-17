<?php
require_once "./model/MarcaModel.php";
require_once "./view/MarcaView.php";

class marcaController{
    private $marcaModel;
    private $marcaView;

    public function __construct(){
        $this-> marcaModel = new MarcaModel();
        $this-> marcaView = new MarcaView();
    }

    function getById($id_marca){
        $marca = $this-> marcaModel->findId($id_marca);
       return $marca;

    }
}
