<?php
include_once('controller/platoController.php');
include_once('config/parameters.php');

if(!isset($GET['controller'])){
    //Si no se pasa nada, se mostrara pagina principal de pedidos
}else{
    $nombre_controller = $GET['controller'].'Controller';

    if(class_exists($nombre_controller)){
        //Miramos si nos pasa una accion
        //si no mostramos por defecto

        $controller = new $nombre_controller();

        if(isset($GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $GET['action'];
        }else{
            $action = action_default;
        }
        $controller->$action();
    }else{
        header("Location:".url.'?controller=pedido');
    }
}

?>