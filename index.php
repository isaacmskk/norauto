<?php
include_once 'controller/platoController.php';
include_once 'config/parameters.php';

// echo 'NORAUTO';
// echo '<br>';

// $controllerName = $_GET['controller'] ?? 'plato';
// $actionName = $_GET['action'] ?? action_default;

// $controllerClassName = $controllerName . 'Controller';

// if (class_exists($controllerClassName)) {
//     $controller = new $controllerClassName();

//     if (method_exists($controller, $actionName)) {
//         $controller->$actionName();
//     } else {
//         header("Location:" . url . '?controller=' . $controllerName);
//     }
// } else {
//     header("Location:" . url . '?controller=plato');
// }
if (!isset($_GET['controller'])){
header("Location: ".url."?controller=plato");
}else{
    $controllerClassName = $_GET['controller'].'Controller';
    if (class_exists($controllerClassName)) {
        $controller = new $controllerClassName();

        if(isset($_GET['action'])&& method_exists($controller,$_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action=action_default;
        }
        $controller->$action();
}
header("Location:" . url . '?controller=plato');
}
?>
