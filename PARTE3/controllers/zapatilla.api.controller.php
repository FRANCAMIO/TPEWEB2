<?php
    require_once'./models/zapatilla.api.model.php';
    require_once'./controllers/api.controller.php';
    require_once'./models/marca.api.model.php';

    class ZapatillaApiController extends ApiController{

        private $model;
        private $modelMarca;

        function __construct(){
            $this->model= new ZapatillaApiModel();
            $this->modelMarca= new MarcaApiModel();
            parent::__construct();
           
        }

        public function updateZapatilla($params=[]){   // PUT
            $id_zapatilla=$params[':ID'];
            $zapatilla=$this->model->getZapatilla($id_zapatilla);

            if($zapatilla){
                $body=$this->getData();
                $id_marca=$body->id_marca;
                $diseño=$body->diseño;
                $talle=$body->talle;
                $material=$body->material;

                $marca=$this->modelMarca->getMarca($id_marca);

                if(!$marca){
                    return $this->view->response(['No existe esa marca'],404);
                }

                $this->model->updateZapatilla($id_marca,$diseño,$talle,$material,$id_zapatilla);
                $this->view->response(['Se actualizo correctamente con el id = '.$id_zapatilla],200);
            }else{
                $this->view->response(['No se encontro la zapatilla con el ID proporcionado'],404);
            }
        }

       // //public function get($params=[]){  // GET ORDENADO Y ADEMAS AGREGO EL OPCIONAL DE ORDENAR POR UN CAMPO
           // if(empty($params)){
              //  $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'ID';
               // $order = isset($_GET['order']) ? $_GET['order'] : 'asc';

               // if(($order =='ASC'|| $order =='DESC') && ($sort_by =='ID'||$sort_by=='id_marca'
                //|| $sort_by=='diseño'||$sort_by=='talle'|| $sort_by=='material')){

               //     $zapatillas=$this->model->getZapatillasOrdenadas($sort_by,$order);
               //     return $this->view->response($zapatillas,200);
               // }else{
               //     return $this->view->response(['Complete los campos'],400);
               // }
           // }else{
           //     $zapatilla=$this->model->getZapatilla($params[':ID']);

              //  if(!empty($zapatilla)){
              //      return $this->view->response($zapatilla,200);
             //  }else{
               //     return $this->view->response(['No existe la zapatilla con ese id = '.$params[':ID']],404);
              //  }
          //  }
       // }
       function get($params = []){
        if(empty($params)){
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
            $per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 10; 
            $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
            $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
    
            $zapatillas = $this->model->getZapatillasOrdenadas($sort_by, $order, $page, $per_page);
            return $this->view->response($zapatillas, 200);
        }else{
            $zapatilla = $this->model->getZapatilla($params[":ID"]);
            if(!empty($zapatilla)){
            return $this->view->response($zapatilla, 200);
            }else{
            $this->view->response(['msg' =>'la zapatilla con el id=' . $params[':ID']. 'no existe'], 404);
            }
        }

    }

    }