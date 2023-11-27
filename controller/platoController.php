<?php
//Creamos el controlador de pedidos
// include_once 'model/plato.php';
include_once 'model/platoDAO.php';

class platoController
{
    public function index()
    {
        session_start();



        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        } else{
            if (isset($_POST['ID_PLATO']) && isset($_POST['NOMBRE'])) {
                if ($_POST['NOMBRE'] == 'NOMBRE') {
                    $pedido = new Pedido(PlatoDAO::getPlatoById($_POST['ID_PLATO']));
                }
                array_push($_SESSION['selecciones'],$pedido);
            }
        }
        $ID_PLATO = $_POST['id'] ?? null;
        $NOMBRE = $_POST['NOMBRE'] ?? null;

        $allPlatos = PlatoDAO::getAllPlatos();

        include_once 'views/cabecera.php';
        include_once 'views/panelPlato.php';
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
        include_once 'views/panelCarrito.php';
        include_once 'views/cabecera.php';
    }

    public function eliminar()
    {
        echo 'Plato a eliminar';
        $ID_PLATO = $_POST['id'] ?? null;
        if ($ID_PLATO) {
            platoDAO::deletePlato($ID_PLATO);
        }
        header("Location:" . url . '?controller=eliminar');
    }

    public function actualizar()
    {
        $ID_PLATO = $_POST['id'] ?? null;
        $NOMBRE = $_POST['NOMBRE'] ?? null;
        $DESCRIPCION = $_POST['DESCRIPCION'] ?? null;
        $FOTO = $_POST['FOTO'] ?? null;
        $PRECIO = $_POST['PRECIO'] ?? null;
        $CAT_ID = $_POST['CAT_ID'] ?? null;

        if ($ID_PLATO && $NOMBRE && $DESCRIPCION && $FOTO && $PRECIO && $CAT_ID) {
            PlatoDAO::seleccionarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $CAT_ID);
        }

        include_once 'views/panelPlato.php';
        header("Location:" . url . '?controller=plato');
    }
}
