<?php
require_once './controller/ZapatillaController.php';
require_once './controller/MarcaController.php';
require_once'./controller/LoginController.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

        $action = 'home'; // accion por defecto
        if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
        }

        $params = explode('/', $action);

        $zapatillaController= new ZapatillaController();
      
        $marcaController= null;
        $loginController= new LoginController();
        switch($params[0]) {

            case 'listar':
                $zapatillaController->showAll();
                break;
            case 'detailZapatilla':
                $zapatillaController->showByIdZapatillas($params[1]);
                break;
               
                case 'deleteZapatilla':
                    $zapatillaController->deleteZapatilla($params[1]);
                     break;
                case 'editZapatillas':
                    $id = $params[1];
                    $zapatillaController->formEditZapatillas($id);
                    $id = $params[1];
                    $zapatillaController->editZapatillas($id);
                     break;
                     case 'login':
                        $loginController->showLogin();
                        break;
                    case 'auth':
                        $loginController->auth();
                        break;
                    case 'logout':
                        $loginController->logout();
                        break;
                    case 'hash':
                        echo password_hash('admin', PASSWORD_DEFAULT);
                        break;
                     case 'formAddZapatilla'     :
                        $zapatillaController->formAddZapatilla();
                        break;
                        case 'addZapatilla':
                            $zapatillaController->addZapatilla();
                            break;
                            default: 
                            echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
                            break;
                    
        }

        ?>