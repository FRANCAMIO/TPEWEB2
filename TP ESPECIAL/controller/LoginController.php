<?php
require_once "./model/LoginModel.php";
require_once "./view/LoginView.php";
require_once "./helper/AuthHelper.php";

class LoginController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new LoginModel();
    }

    public function showLogin($message = null) {
        if (!AuthHelper::isLogged()) {
            $this->view->showLogin($message);
        } else {
            header('Location: ' . BASE_URL . 'listar');
        }
    }

    public function auth() {

        if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
            $this->showLogin('Faltan completar campos');
            die();
        }

        $user = $this->model->getUser();
        if(empty($user)) {
            $this->showLogin('El usuario no existe');
            die();
        }

        if(!password_verify($_POST['contraseña'], $user->contraseña)) {
            $this->showLogin('La contraseña es incorrecta');
            die();
        }
        AuthHelper::login($user);
        header('Location: ' . BASE_URL . 'listar');

    }

    public function logout() {
        if (AuthHelper::isLogged()) {
            AuthHelper::logout();
        }
        header('Location: ' . BASE_URL .'login');
    }
}