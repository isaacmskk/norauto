<?php
include_once 'controller/platoController.php';
include_once 'config/parameters.php';
include_once 'controller/ComentariosController.php';
include_once 'controller/APIController.php';
include_once 'controller/repartidoresController.php';
include_once 'controller/pedidosController.php';

if (!isset($_GET['controller'])) {
    header("Location: " . url . "?controller=plato");
} else {
    $controllerClassName = $_GET['controller'] . 'Controller';
    if (class_exists($controllerClassName)) {
        $controller = new $controllerClassName();

        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = action_default;
        }
        $controller->$action();
    } else {
        header("Location:".url.'?controller=plato');
    }
}
