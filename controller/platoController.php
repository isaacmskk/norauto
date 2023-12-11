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
include_once 'model/pedido.php';


class platoController
{
    public function index()
    {
        session_start();

        include_once 'views/cabecera.php';
        include_once 'views/norauto.php';
        include_once 'views/footer.php';

        if (isset($_COOKIE['ultimopedido'])) {
            setcookie('ultimopedido', '', time() - 3600);
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
    public function selecciones()
    {
        session_start();
        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        }

        if (isset($_POST['id'])) {
            $plato = $_POST['id'];
            $selecciones = new pedido(PlatoDAO::getPlatoById($plato));
            $selecciones->setCantidad(1);
            array_push($_SESSION['selecciones'], $selecciones);
            header("Location:" . url . "?controller=plato&action=menu");
        }
    }
    public function compra()
    {
        session_start();

        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        }

        if (isset($_POST['Añadir'])) {
            $pedido = $_SESSION['selecciones'][$_POST['Añadir']];
            $pedido->setCantidad($pedido->getCantidad() + 1);
        } else if (isset($_POST['Eliminar'])) {
            $pedido = $_SESSION['selecciones'][$_POST['Eliminar']];
            if ($pedido->getCantidad() == 1) {
                unset($_SESSION['selecciones'][$_POST['Eliminar']]);
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            } else {
                $pedido->setCantidad($pedido->getCantidad() - 1);
            }
            header("Location:" . url . "?controller=plato&action=compra");
        }
        $precioTotal = CalculadoraPrecios::calculadoraPrecioPedido($_SESSION['selecciones']);

        include_once 'views/cabecera.php';
        include_once 'views/panelCompra.php';
        include_once 'views/footer.php';
    }


    public function confirmar()
    {
        session_start();
        setcookie("ultimopedido", $_POST['cantidadFinal'], time() + 3600);
        unset($_SESSION['selecciones']);
        header("Location:" . url . '?controller=plato');
    }

    public function login()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uname = $_POST["uname"];
            $psw = $_POST["psw"];

            $con = db::connect();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE NOMBRE= ? AND password= ?");
            $stmt->bind_param("ss", $uname, $psw);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("Location:" . url . '?controller=plato');
                $_SESSION["username"] = $uname;
                return true;
            } else {
                header("Location:" . url . '?controller=plato&action=login');
                return false;
            }
        }
        include_once 'views/cabecera.php';
        include_once 'views/login.php';
        include_once 'views/footer.php';
    }
    public function register()
    {
        session_start();
        // Primero, verifica si el formulario se ha enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $apellido = $_POST["apellido"];
            $uname = $_POST["uname"];
            $psw = $_POST["psw"];
            $con = db::connect();

            if (!empty($_POST["name"]) && !empty($_POST["apellido"]) && !empty($_POST["uname"]) && !empty($_POST["psw"])) {
                $con->query("INSERT INTO usuarios ( MAIL, APELLIDO, NOMBRE, password) VALUES ('$name', '$apellido', '$uname', '$psw')");
                header("Location:" . url . '?controller=plato&action=login');
            } else {
                echo "Por favor, completa todos los campos requeridos.";
            }
        }

        include_once 'views/cabecera.php';
        include_once 'views/register.php';
        include_once 'views/footer.php';
    }
}
