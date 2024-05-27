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
        $query = "SELECT p.ID_PEDIDO, p.FECHA, p.ID_CLIENTE, SUM(pl.PRECIO * pp.CANTIDAD + p.PROPINA) AS TOTAL_PEDIDO
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

    private function getPedidosPendientes()
    {
        $con = db::connect();
        $query = "SELECT p.ID_PEDIDO, p.FECHA, p.ID_CLIENTE, SUM(pl.PRECIO * pp.CANTIDAD + p.PROPINA) AS TOTAL_PEDIDO
                  FROM pedido p
                  LEFT JOIN platos_pedido pp ON p.ID_PEDIDO = pp.ID_PEDIDO
                  LEFT JOIN plato pl ON pp.ID_PLATO = pl.ID_PLATO
                  WHERE p.ESTADO = 'pendiente' AND p.ID_REPARTIDOR IS NULL
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
        $url = "https://api.meteomatics.com/2024-05-26T00:00:00.000+02:00--2024-06-11T22:00:00.000+02:00:PT5M/t_2m:C/41.3828939,2.1774322/html?model=mix";

        $context = stream_context_create(array(
            'http' => array(
                'header'  => "Authorization: Basic " . base64_encode("$username:$password")
            )
        ));

        $response = file_get_contents($url, false, $context);
        // var_dump($response); // Verificar la respuesta JSON
        $data = json_decode($response, true);
        var_dump($data); // Verificar los datos decodificados

        // Procesar los datos del clima
        $temperature = $data['temperature'] ?? null;
        $description = $data['description'] ?? null;
        $icon = $data['icon'] ?? null;

        // Devolver los datos del clima
        return array(
            'temperature' => $temperature,
            'description' => $description,
            'icon' => $icon
        );
    }
}
