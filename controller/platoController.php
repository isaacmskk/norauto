<?php
//Creamos el controlador de pedIDos
// include_once 'model/plato.php';
include_once 'model/platoDAO.php';

class platoController{

    public function index(){
        
        $allPlatos = PlatoDAO::getAllPlatos();
        
        include_once 'views/cabecera.php';
        include_once 'views/panelPlato.php';

    }
public function compra(){
    echo 'Pagina de compra';
   
}
public function eliminar(){
    echo 'Plato a eliminar';
    $ID_PLATO = $_POST['id'];
    platoDAO::deletePlato($ID_PLATO);
    header("Location:".url.'?controller=plato');
    //falta if
}
    
public function modificar(){
    echo 'Plato a modificar';
    $ID_PLATO = $_POST['ID_PLATO'];
    $NOMBRE = $_POST['NOMBRE'];
    $DESCRIPCION = $_POST['DESCRIPCION'];
    $INGREDIENTES = $_POST['INGREDIENTES'];
    $FOTO = $_POST['FOTO'];
    $PRECIO = $_POST['PRECIO'];
    $ID_CAT = $_POST['ID_CAT'];

    platoDAO::modificarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $INGREDIENTES, $FOTO, $PRECIO, $ID_CAT);

    header("Location:".url.'?controller=plato');
    include_once 'views/panelPlato.php';

}

public function actualizar(){
    $ID_PLATO = $_POST['id'];
    $NOMBRE = $_POST['NOMBRE'];
    $DESCRIPCION = $_POST['DESCRIPCION'];
    $INGREDIENTES= $_POST['INGREDIENTES'];
    $FOTO =$_POST['FOTO'];
    $PRECIO =$_POST['PRECIO'];
    $CAT_ID =$_POST['CAT_ID'];
    include_once 'views/panelPlato.php';
    PlatoDAO::modificarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $INGREDIENTES, $FOTO, $PRECIO, $CAT_ID);
    header("Location:".url.'?controller=plato');



    
}
}




?>