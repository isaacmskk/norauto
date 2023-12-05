<?php
include_once 'model/platoDAO.php';
include_once 'model/pedido.php';
include_once 'utils/CalculadoraPrecios.php';
include_once 'model/hamburguesas.php';
include_once 'model/hotdogs.php';
include_once 'model/pizzas.php';
include_once 'model/pasta.php';
include_once 'model/paellas.php';
include_once 'model/plato.php';



class platoController
{
    public function index()
    {
        session_start();
   
        include_once 'views/cabecera.php';
        include_once 'views/norauto.php';
        include_once 'views/footer.php';

        if (isset($_COOKIE['ultimopedido'])){
            setcookie('ultimopedido','',time()-3600);
        }
    }

    public function menu()
    {
        session_start();
        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        } else {
            if (isset($_POST['Añadir'])) {
                $selecciones = PlatoDAO::getPlatoById($_POST['ID_PLATO']);
                array_push($_SESSION['selecciones'], $selecciones);
                
            }
        }
        
        $allPlatos = PlatoDAO::getAllPlatos();


        include_once 'views/cabecera.php';
        include_once 'views/menu.php';
        include_once 'views/footer.php';

    }
    public function selecciones(){
        session_start();
        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        }
        
        if (isset($_POST['id'])) {
            $plato = $_POST['id'];
            $selecciones = new pedido(PlatoDAO::getPlatoById($plato));
            $selecciones->setCantidad(1);
            array_push($_SESSION['selecciones'], $selecciones);
            header("Location:".url."?controller=plato&action=menu");
        }

    }
    public function compra(){
        session_start();

        if (isset($_POST['Añadir'])){
            $pedido = $_SESSION['selecciones'][$_POST['Añadir']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['Eliminar'])){
            $pedido = $_SESSION['selecciones'][$_POST['Eliminar']];
            if ($pedido->getCantidad()==1){
                unset($_SESSION['selecciones'][$_POST['Eliminar']]);

                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }
        $precioTotal = CalculadoraPrecios::calculadoraPrecioPedido($_SESSION['selecciones']);

        include_once 'views/cabecera.php';
        include_once 'views/panelCompra.php';
        include_once 'views/footer.php';


    }
    
    public function confirmar(){
        session_start();
        //te almacena el pedido en la base de datos pedidoDAO que guarda el pedido en BBDD
        //guardo la cookie
        setcookie("ultimopedido", $_POST['cantidadFinal'],time()+3600);
        unset($_SESSION['selecciones']);
        header("Location:".url.'?controller=plato');

    }
}
