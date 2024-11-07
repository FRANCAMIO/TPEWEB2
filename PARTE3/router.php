<?php
    require_once './libs/router.php';
    require_once './config.php';
    require_once './controllers/zapatilla.api.controller.php';

    //creo el router
    $router = new Router();

    //defino la tabla  endpoint    verbo        controller          metodo
    $router->addRoute('zapatilla/:ID','GET','ZapatillaApiController','getZapatilla');
    $router->addRoute('zapatilla/:ID','PUT','ZapatillaApiController','updateZapatilla'); // modificar una zapatilla
    $router->addRoute('zapatillas','GET','ZapatillaApiController','get'); //obtener listado ordenado y por un campo



    //rutea
    $router->route($_GET["resource"],$_SERVER['REQUEST_METHOD']);