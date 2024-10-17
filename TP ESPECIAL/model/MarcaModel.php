<?php
class MarcaModel{
    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;dbname=sneakers;charset=utf8', 'root', '');
    }

    public function findId ($id_marca){
        $query=$this->db->prepare("SELECT * FROM marcas WHERE id_marca = ?");
        $query->execute([$id_marca]);

        $marca= $query->fetch(PDO::FETCH_OBJ);

        return $marca;

    }



}


?>