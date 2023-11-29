<?php
include_once 'model/platoDAO.php';

class platoController
{
    public function index()
    {
        include_once 'views/cabecera.php';
        include_once 'views/norauto.php';
        include_once 'views/footer.php';
    }

    public function menu(){
        if(!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if(isset($_POST['Añadir'])){
                $productoSel = PlatoDAO::getPlatoById($_POST['ID_PLATO'], $_POST['ID_CAT']);
                array_push($_SESSION['selecciones'],$productoSel);
            }

        }
    

        $allPlatos = PlatoDAO::getAllPlatos();

        include_once 'views/cabecera.php';
        include_once 'views/menu.php';
        include_once 'views/footer.php';
        // session_start();

        // if(!isset($_GET['categoria'])){
        //     $allProducts = PlatoDAO::getAllPlatos();
        //     $categoria = 'Todos los Productos';
        // }else{
        //     if(isset($_GET['categoria'])){
        //         $categoria = $_GET['categoria'];
        //         if($categoria == 'TodosProductos'){
        //             $allProducts = PlatoDAO::getAllPlatos();
        //         }else{
        //             $allProducts = PlatoDAO::getAllByTipe($categoria);
        //         }
        //     }
        // }

        // include_once 'views/cabecera.php';
        // include_once 'views/panelPlato.php';
        // include_once 'views/footer.php';

    }

    public function compra()
    {
        session_start();
        if(isset($_POST['Añadir'])){
            $pedido = $_SESSION['selecciones'][$_POST['Añadir']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['Eliminar'])){
            $pedido = $_SESSION['selecciones'][$_POST['Eliminar']];
            if($pedido->getCantidad()==1){
                unset($_SESSION['selecciones'][$_POST['Eliminar']]);
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }
        echo 'Pagina de compra';
        include_once 'views/panelCompra.php';
        include_once 'views/cabecera.php';
    }

    // public function eliminar()
    // {
    //     echo 'Plato a eliminar';
    //     $ID_PLATO = $_POST['id'] ?? null;
    //     if ($ID_PLATO) {
    //         platoDAO::deletePlato($ID_PLATO);
    //     }
    //     header("Location:" . url . '?controller=eliminar');
    // }

    // public function actualizar()
    // {
    //     $ID_PLATO = $_POST['id'] ?? null;
    //     $NOMBRE = $_POST['NOMBRE'] ?? null;
    //     $DESCRIPCION = $_POST['DESCRIPCION'] ?? null;
    //     $FOTO = $_POST['FOTO'] ?? null;
    //     $PRECIO = $_POST['PRECIO'] ?? null;
    //     $ID_CAT = $_POST['ID_CAT'] ?? null;

    //     if ($ID_PLATO && $NOMBRE && $DESCRIPCION && $FOTO && $PRECIO && $ID_CAT) {
    //         PlatoDAO::seleccionarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $ID_CAT);
    //     }

    //     include_once 'views/panelPlato.php';
    //     header("Location:" . url . '?controller=plato');
    // }
}
