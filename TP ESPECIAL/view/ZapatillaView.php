<?php


class ZapatillaView {

    function showAll($zapatillas){
        require_once "./templeates/show-all.phtml";

    }
    function showById($zaatillas,$marca){
        require_once "./templeates/show-one.phtml";
    }
    function showError($error){
        require_once 'templeates/error.phtml';
    }
    function showEditZapatilla($id,$zapatilla){
        require_once './templeates/editForm.phtml';
    }
    function showFormAdd(){
        require_once './templeates/formAdd.phtml';
    }
}
