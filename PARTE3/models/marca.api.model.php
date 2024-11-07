<?php
   require_once'./config.php';

class MarcaApiModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getMarca($id_marca){
        $query=$this->db->prepare('SELECT * FROM marcas WHERE id_marca=?');
        $query->execute([$id_marca]);
        return $query->fetch(PDO::FETCH_OBJ);
    }




}