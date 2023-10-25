<?php
//Creamos el controlador de pedidos
include_once 'model/plato.php';
include_once 'model/platoDAO.php';
class platoController{

    public function index(){
        
        $allPlatos = PlatoDAO::getAllPlatos();
        
        include_once 'views/cabecera.php';
        include_once 'views/panelpedido.php';

    }
public function compra(){
    echo 'Pagina de compra';
   
}
public function eliminar(){
    echo 'Plato a eliminar';
    $id_plato = $_POST['id'];
    platoDAO::deletePlato($id_plato);
    header("Location:".url.'?controller=plato');
    //falta if
}
    
    public function actualizar(){
        $id_plato = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $ingredientes= $_POST['ingredientes'];
        $foto =$_POST['foto'];
        $precio =$_POST['precio'];
        $cat_id =$_POST['cat_id'];
        include_once 'views/panelPlato.php';
    
    
}
public function modificar(){
    $id_plato = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $ingredientes= $_POST['ingredientes'];
    $foto =$_POST['foto'];
    $precio =$_POST['precio'];
    $cat_id =$_POST['cat_id'];
    include_once 'views/panelPlato.php';
    PlatoDAO::modificarPlato($id_plato, $nombre, $descripcion, $ingredientes, $foto, $precio, $cat_id);
    header("Location:".url.'?controller=plato');



    
}
}




?>