<?php
class LoginModel{
    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;dbname=sneakers;charset=utf8', 'root', '');
    }

   
    public function getUser() {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $query->execute([$_POST['usuario']]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


}


?>