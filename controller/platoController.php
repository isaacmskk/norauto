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
    /*funcion que inicia la session, recoge el valor de la cookie ultimopedido y si no esta vacia la enseña por pantalla, 
    tambien comprobara que en caso de que admin haya iniciado sesion se mostrara una cabecera u otra, en caso contrario no lo hara.
    mostrara la pagina norauto y el footer.
    */
    public function index()
    {
        session_start();
        if (isset($_COOKIE['ultimopedido'])) {
            if (empty($_COOKIE['ultimopedido'])) {
                $msg_cookie = 'No has hecho ningun pedido todavia';
            } else {
                $msg_cookie = 'Tu ultimo pedido fue de ' . $_COOKIE['ultimopedido'] . '€';
            }
        } else {
            $msg_cookie = 'No has hecho ningun pedido todavia';
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

            include_once 'views/cabeceraadmin.php';
        } else {
            include_once 'views/cabecera.php';
        }

        include_once 'views/norauto.php';
        include_once 'views/footer.php';
    }
    /*funcion que inicia la session, comprueba si selecciones existe o no, si el boton de añadir es pulsado se añadira al array de selecciones ese plato clicado gracias a 
    getplatobyid de esta manera se enviara el id del plato para poder recuperarlo.
    tambien sacara todos los platos por pantalla gracias a getallplatos
    mostrara una cabecera dependiendo del user que este logeado y la pagina de menu y footer
    */
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
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

            include_once 'views/cabeceraadmin.php';
        } else {
            include_once 'views/cabecera.php';
        }

        include_once 'views/menu.php';
        include_once 'views/footer.php';
    }
    /*
    esta funcion lo que hace es cuando el boton de añadir es clicado se añadira al array de selecciones ese plato clicado gracias a 
    getplatobyid de esta manera se enviara el id del plato para poder recuperarlo. Una vez este boton es clicado en la cabecera aparecera el numero de platos añadidos,
    ademas cada vez que se clique al boton se redirigira a la misma pagina.
    */
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
    /* 
    Esta funcion hara que una vez estemos en la pagina de carrito podamos añadir o restar o incluso eliminar del total un plato.Una vez accionado cualquiera
    de los botones mencionados el precio tanto como el numero de platos se ira actualizando.
    */
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

        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

            include_once 'views/cabeceraadmin.php';
        } else {
            include_once 'views/cabecera.php';
        }
        include_once 'views/panelCompra.php';
        include_once 'views/footer.php';
    }
    /* 
    esta es la funcion con la cual se confirmara el pedido de los platos escogidos.
    lo que hace es enviarte a la pagina home y mostrar el precio total del pedido gracias a la cookie mostrada anteriormente, tambien borra todos los platos del carrito.
    */

    public function confirmar()
    {
        session_start();
        if (!isset($_SESSION['ID_CLIENTE'])) {
            // Si no está definida, inicializamos con un valor predeterminado
            $cliente = 0;
        } else {
            // Si está definida, usamos su valor actual
            $cliente = $_SESSION['ID_CLIENTE'];
        }
        $fecha = date('d-m-Y');
        $total = CalculadoraPrecios::calculadoraPrecioPedido($_SESSION['selecciones']);
        $pedidito = PlatoDAO::añadirPedido($fecha, $cliente, $total, $_SESSION['selecciones']);
        setcookie("ultimopedido", $_POST['cantidadFinal'], time() + 3600);
        unset($_SESSION['selecciones']);
        header("Location:" . url . '?controller=plato');
    }
    /*
    esta funcion logea al usuario comprobando anteriormente que este existe en la base de datos,
    el user envia mediante un formulario los datos, estos se recogen y comprueban, si todo es correcto son enviados 
    a la pagina home con su user mostrado en la cabecera, en caso contrario volveran a la pagina de login donde podran logearse de nuevo.
    */
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
                $row = $result->fetch_assoc();
                $id = $row['ID_CLIENTE'];
                $_SESSION['ID_CLIENTE'] = $id;
                return true;
            } else {
                header("Location:" . url . '?controller=plato&action=login');
                return false;
            }
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

            include_once 'views/cabeceraadmin.php';
        } else {
            include_once 'views/cabecera.php';
        }

        include_once 'views/login.php';
        include_once 'views/footer.php';
    }
    /*
    la funcion de register sube un nuevo usuario a traves de un formulario que completa el user
    este manda a la base de datos los datos necesarios para a continuacion hacer login.
    */
    public function register()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $apellido = $_POST["apellido"];
            $uname = $_POST["uname"];
            $psw = ($_POST["psw"]);
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
    /*
    esta funcion destruye la sesion de username si esta existe, con lo cual deslogeara al user.
    */
    public function logout()
    {
        session_start();
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
            session_destroy();
            header("Location:" . url . '?controller=plato');
        }
        include_once 'views/cabecera.php';
        include_once 'views/login.php';
        include_once 'views/footer.php';
    }
    //esta funcion servira para la pagina de panel admin, el admin podra ver todos los platos para asi editarlos/eliminarlos,etc..
    public function admin()
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

        include_once 'views/cabeceraadmin.php';
        include_once 'views/paneladmin.php';
    }
    //esta funcion hara que al clicar el boton eliminar el plato se borre de la bbdd
    public static function eliminar()
    {
        if (isset($_POST["ID_PLATO"])) {
            $p = $_POST["ID_PLATO"];
            PlatoDAO::eliminarPlato($p);
        }

        header("Location:" . url . '?controller=plato&action=admin');
    }
    //esta funcion hara que al clicar el boton de editar se envie a una pagina con un formulario para editar el plato seleccionado
    public function edit()
    {
        if (isset($_POST["ID_PLATO"])) {
            $id_plato = $_POST["ID_PLATO"];
            $plato = PlatoDAO::getPlatoById($id_plato);
            include_once 'views/editarañadir.php';
        } else {
            echo 'ERROR DE ID';
        }
    }
    /*
esta funcion actualiza el plato con lo que se ha enviado a traves del form de edit al cual la anterior funcion nos ha redirigido
*/
    public function editplato()
    {
        if (isset($_POST['ID_PLATO']) && isset($_POST['NOMBRE']) && isset($_POST['PRECIO']) && isset($_POST['FOTO'])) {
            $id_plato = $_POST["ID_PLATO"];
            $nombre = $_POST["NOMBRE"];
            $precio = $_POST["PRECIO"]; // Convertir el precio a un número
            $foto = $_POST["FOTO"];
            if (empty($_FILES['FOTO']['name'])) {
                $foto = $_POST['FOTO_ANTIQUEDA'];
            } else {
                $foto = $_FILES['FOTO']['name'];
            }
            PlatoDAO::updatePlato($id_plato, $nombre, $precio, $foto);
        }
        header("Location:" . url . '?controller=plato&action=admin');
    }

    /*
esta funcion añade un plato a traves de un formulario tambien en el panel admin
*/

    public function añadir()
    {
        if (isset($_POST['NOMBRE']) && isset($_POST['PRECIO']) && isset($_POST['CAT_ID']) && isset($_POST['FOTO'])) {
            $nombre = $_POST['NOMBRE'];
            $precio = $_POST['PRECIO'];
            $categoria = $_POST['CAT_ID'];
            $imagen = $_POST['FOTO'];
            $resultado = PlatoDAO::añadirPlato($nombre, $precio, $categoria, $imagen);

            header("Location:" . url . '?controller=plato&action=admin');
        }
    }

}
