<?php
    require_once'./config.php';

    class ZapatillaApiModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }

        public function getZapatilla($id){
            $query=$this->db->prepare('SELECT * FROM zapatillas WHERE id_zapatilla=?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function updateZapatilla($id_marca,$diseño,$talle,$material,$id_zapatilla){
            $query=$this->db->prepare('UPDATE zapatillas SET id_marca=?, diseño=?, talle=?, $material=? WHERE id_zapatilla=?');
            $query->execute([$id_marca,$diseño,$talle,$material,$id_zapatilla]);
        }

        public function getZapatillasOrdenadas($sort_by, $order, $page, $per_page) {
            $limit = $per_page;
            $offset = ($page - 1) * $per_page;
            $query = $this->db->prepare("SELECT * FROM zapatillas ORDER BY $sort_by $order LIMIT :limit OFFSET :offset");
        
            // Vincula los valores de los marcadores de posición
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $zapatillas = $query->fetchAll(PDO::FETCH_OBJ);
            return $zapatillas;
        }


    }