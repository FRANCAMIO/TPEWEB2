<?php

class ZapatillaModel{
private $db;


  function __construct(){
        $this->db= new PDO('mysql:host=localhost;dbname=sneakers;charset=utf8', 'root', '');
    }

    function findAll(){
        $query=$this->db->prepare("SELECT * FROM zapatillas");
         $query->execute();
          $zapatillas= $query->fetchAll(PDO::FETCH_OBJ);
        return $zapatillas;
    }
    function getById($id){
        $query = $this->db->prepare('SELECT * FROM zapatillas WHERE id_zapatilla = ?');
         $query->execute([$id]);   
          $zapatilla = $query->fetch(PDO::FETCH_OBJ);
    
        return $zapatilla;

    }
    function deleteZapatilla($id){
        $query = $this->db->prepare('DELETE FROM zapatillas WHERE id_zapatilla= ?');
         $query->execute([$id]);
          header("Location:" .BASE_URL."listar");
    }
    public function updateZapatilla($diseño,$talle,$material,$id) {
        $query = $this->db->prepare('UPDATE zapatillas SET diseño = ?, talle = ?, material = ? WHERE id_zapatilla = ?');
        $query->execute([$diseño,$talle,$material,$id]);
    }
    public function addZapatilla($id_marca,$diseño, $talle, $material){
        $query=$this->db->prepare('INSERT INTO zapatillas(id_marca,diseño, talle, material)VALUES(?,?,?,?)');
        $query->execute([$id_marca,$diseño, $talle, $material]);
        $this->db->lastInsertId();
        header("Location:" .BASE_URL .'listar');
        }

    }