<?php
include_once 'model/platoDAO.php';

class platoController
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        }

        include_once 'views/cabecera.php';
        include_once 'views/norauto.php';
        include_once 'views/footer.php';
    }

    public function menu()
    {
        session_start();
        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        } else {
            if (isset($_POST['Añadir'])) {
                $selecciones = PlatoDAO::getPlatoById($_POST['ID_PLATO'], $_POST['ID_CAT']);
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
        } else {
            if (isset($_POST['Añadir'])) {
                $ID_PLATO = $_POST['ID_PLATO'];
                $ID_CAT = $_POST['ID_CAT'];
                $selecciones = PlatoDAO::getPlatoById($ID_PLATO, $ID_CAT);
                if (isset($_SESSION['selecciones'][$ID_PLATO])) {
                    $_SESSION['selecciones'][$ID_PLATO]->cantidad += 1;
                } else {
                    $_SESSION['selecciones'][$ID_PLATO] = $selecciones;
                    $_SESSION['selecciones'][$ID_PLATO]->cantidad = 1;
                }
            }
            header("Location:".url."?controller=plato&action=menu");
        }
    }
    
    public function compra()
    {
        session_start();
        if (isset($_POST['Añadir'])) {
            $pos = $_POST['Añadir'];
            $_SESSION['selecciones'][$pos]->setCantidad($_SESSION['selecciones'][$pos]->getCantidad() + 1);
        } else if (isset($_POST['Eliminar'])) {
            $pos = $_POST['Eliminar'];
            if ($_SESSION['selecciones'][$pos]->getCantidad() == 1) {
                unset($_SESSION['selecciones'][$pos]);
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            } else {
                $_SESSION['selecciones'][$pos]->setCantidad($_SESSION['selecciones'][$pos]->getCantidad() - 1);
            }
        }
        echo 'Pagina de compra';
        include_once 'views/cabecera.php';
        include_once 'views/panelCompra.php';
        include_once 'views/footer.php';
    }
    

}
