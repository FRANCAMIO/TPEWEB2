<?php
require_once './model/ZapatillaModel.php';
require_once './view/ZapatillaView.php';
require_once './controller/MarcaController.php';

class  ZapatillaController{
    private $zapatillaModel;
    private $zapatillaView;
    private $marcaController;

    public function __construct()
    {
        $this->marcaController= new MarcaController();
        $this->zapatillaModel= new ZapatillaModel();
        $this->zapatillaView = new ZapatillaView();
    }
    public function showAll(){
        $zapatillas= $this->zapatillaModel->findAll();
        $this->zapatillaView->showAll($zapatillas);
    }
    public function showByIdZapatillas($id){
      $zapatilla=$this->zapatillaModel->getById($id);
        if (!$zapatilla){
            echo"no existe";
        }
        else{
            $marca = $this->marcaController->getById($zapatilla->id_marca);
            if(!isset($marca)){
                echo"marca no existente";
            }
            else{
        $this->zapatillaView->showById($zapatilla,$marca);
            }
        }
    }
    public function deleteZapatilla($id){
        if (AuthHelper::isLogged()){
        $this->zapatillaModel->deleteZapatilla($id);
    }
}
    public function formEditZapatillas($id){
        //Traigo los datos de este id y los inserto el en form
          $zapatilla = $this->zapatillaModel->getbyid($id);
          $this->zapatillaView->showEditZapatilla($id,$zapatilla);
      }
      
      public function editZapatillas($id) {
        // Verificamos si los campos existen en $_POST y los asignamos a las variables
        $diseño = isset($_POST['diseño']) ? $_POST['diseño'] : null;
        $talle = isset($_POST['talle']) ? $_POST['talle'] : null;
        $material = isset($_POST['material']) ? $_POST['material'] : null;
    
        // Comprobar que todos los campos están llenos
        if (empty($diseño) || empty($talle) || empty($material)) {
            $this->zapatillaView->showError("Debe completar todos los campos");
        } else {
            // Si los campos están completos, hacemos la actualización
            $this->zapatillaModel->updateZapatilla($diseño, $talle, $material, $id);
            header("Location: " . BASE_URL . "listar");
        }
    }
    public function formAddZapatilla(){
        $this->zapatillaView->showFormAdd();
    }
    public function addZapatilla(){
        if(empty($_POST['id_marca'])&& empty($_POST['diseño'])&& empty($_POST['talle'])&& empty($_POST['material'])){
        $this->zapatillaView->showError('faltan completar datos');
        }
        else{
        $id_marca=$_POST['id_marca'];
        $diseño=$_POST['diseño'];
        $talle=$_POST['talle'];
        $material=$_POST['material'];
        $this->zapatillaModel->addZapatilla($id_marca,$diseño,$talle,$material);
        
    }
}

    
}