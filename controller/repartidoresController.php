<?php
class repartidoresController
{
    public function register()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["NOMBRE"];
            $uname = $_POST["USERNAME"];
            $psw = $_POST["PASSWORD"];
            $metodo = $_POST["METODOTRANSPORTE"];
            $rol = $_POST["ROL"];

            $con = db::connect();

            if (!empty($name) && !empty($uname) && !empty($psw) && !empty($metodo) && !empty($rol)) {
                $con->query("INSERT INTO repartidores (NOMBRE, USERNAME, PASSWORD, METODOTRANSPORTE, ROL) VALUES ('$name', '$uname', '$psw', '$metodo', '$rol')");
                header("Location: ?controller=repartidores&action=login");
            } else {
                echo "Por favor, completa todos los campos requeridos.";
            }
        }


        include_once 'views/cabecera.php';
        include_once 'views/repartidoresregister.php';
        include_once 'views/footer.php';
    }
    public function login()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["USERNAME"];
            $password = $_POST["PASSWORD"];

            $con = db::connect();
            $result = $con->query("SELECT * FROM repartidores WHERE USERNAME='$username' AND PASSWORD='$password'");

            if ($result->num_rows > 0) {
                $repartidor = $result->fetch_assoc();
                $_SESSION['repartidor'] = $repartidor;
                header("Location: ?controller=repartidores&action=profile");
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }

        include_once 'views/cabecera.php';
        include_once 'views/loginrepartidor.php';
        include_once 'views/footer.php';
    }

    public function profile()
    {
        session_start();
        if (!isset($_SESSION['repartidor'])) {
            header("Location: ?controller=repartidores&action=login");
            exit();
        }

        $repartidor = $_SESSION['repartidor'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["NOMBRE"];
            $metodotransporte = $_POST["METODOTRANSPORTE"];
            $disponible = isset($_POST["DISPONIBLE"]) ? 1 : 0;

            $con = db::connect();
            $id_repartidor = $repartidor['ID_REPARTIDOR'];
            $con->query("UPDATE repartidores SET NOMBRE='$nombre', METODOTRANSPORTE='$metodotransporte', DISPONIBLE='$disponible' WHERE ID_REPARTIDOR='$id_repartidor'");

            $repartidor['NOMBRE'] = $nombre;
            $repartidor['METODOTRANSPORTE'] = $metodotransporte;
            $repartidor['DISPONIBLE'] = $disponible;
            $_SESSION['repartidor'] = $repartidor;

            echo "Información actualizada con éxito.";
        }

        $weather = $this->getWeather();
        $historialPedidos = $this->getHistorialPedidos($repartidor['ID_REPARTIDOR']);
        $pedidosPendientes = $this->getPedidosPendientes();

        include_once 'views/cabecera.php';
        include_once 'views/perfilrepartidor.php';
        include_once 'views/footer.php';
    }

    private function getHistorialPedidos($idRepartidor)
    {
        $con = db::connect();
        $query = "SELECT p.ID_PEDIDO, p.FECHA, p.ID_CLIENTE, SUM(pl.PRECIO * pp.CANTIDAD + p.PROPINA  + 5) AS TOTAL_PEDIDO
                  FROM pedido p
                  INNER JOIN platos_pedido pp ON p.ID_PEDIDO = pp.ID_PEDIDO
                  INNER JOIN plato pl ON pp.ID_PLATO = pl.ID_PLATO
                  WHERE p.ID_REPARTIDOR = ?
                  GROUP BY p.ID_PEDIDO
                  ORDER BY p.FECHA DESC";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $idRepartidor);
        $stmt->execute();
        $result = $stmt->get_result();

        $historialPedidos = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $historialPedidos[] = $row;
            }
        }

        $stmt->close();
        return $historialPedidos;
    }

    public function aceptarPedido()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID_PEDIDO'])) {
            $idPedido = $_POST['ID_PEDIDO'];
            $idRepartidor = $_SESSION['repartidor']['ID_REPARTIDOR'];

            $con = db::connect();
            $stmt = $con->prepare("UPDATE pedido SET ESTADO = 1, ID_REPARTIDOR = ? WHERE ID_PEDIDO = ?");
            $stmt->bind_param("ii", $idRepartidor, $idPedido);
            $stmt->execute();
            $con->close();
        }
        header("Location: ?controller=repartidores&action=profile");
    }

    public function rechazarPedido()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID_PEDIDO'])) {
            $idPedido = $_POST['ID_PEDIDO'];
            // Actualizar el estado del pedido a 'Rechazado'
            $con = db::connect();
            $stmt = $con->prepare("UPDATE pedido SET ESTADO = 'Rechazado', ID_REPARTIDOR = NULL WHERE ID_PEDIDO = ?");
            $stmt->bind_param("i", $idPedido);
            $stmt->execute();
            $con->close();
        }
        header("Location: ?controller=repartidores&action=profile");
    }

    private function getPedidosPendientes()
    {
        $con = db::connect();
        $query = "SELECT p.ID_PEDIDO, p.FECHA, p.ID_CLIENTE, SUM(pl.PRECIO * pp.CANTIDAD + p.PROPINA + 5) AS TOTAL_PEDIDO
                  FROM pedido p
                  LEFT JOIN platos_pedido pp ON p.ID_PEDIDO = pp.ID_PEDIDO
                  LEFT JOIN plato pl ON pp.ID_PLATO = pl.ID_PLATO
                  WHERE p.ESTADO = 0 AND p.ID_REPARTIDOR IS NULL
                  GROUP BY p.ID_PEDIDO";
        $result = $con->query($query);

        $pedidosPendientes = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedidosPendientes[] = $row;
            }
        }

        return $pedidosPendientes;
    }


    public function getWeather()
    {
        $username = "insbernatelferrer_montes_isaac";
        $password = "82dfaDI0DB";
        $url = "https://api.meteomatics.com/2024-05-29T00:00:00Z--2024-06-11T22:00:00Z:PT5M/t_2m:C/41.3828939,2.1774322/json?model=mix";

        $context = stream_context_create(array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("$username:$password")
            )
        ));

        $response = @file_get_contents($url, false, $context);

        if ($response === FALSE) {
            $error = error_get_last();
            var_dump($error); // Print the error for debugging
            return null;
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            var_dump(json_last_error_msg()); // Print JSON error
            return null;
        }

        // Process weather data
        $temperature = $data['data'][0]['coordinates'][0]['dates'][0]['value'] ?? null;
        $description = $data['data'][0]['parameter'] ?? null;
        $icon = "https://your_icon_service/{$description}.png"; // Example URL for icon

        // Return weather data
        return array(
            'temperature' => $temperature,
            'description' => $description,
            'icon' => $icon
        );
    }
}
