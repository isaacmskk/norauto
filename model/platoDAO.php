<?php
include_once "controller/platoController.php";
include_once 'config/db.php';
include_once 'plato.php';
include_once 'pedido.php';
include 'pasta.php';

class PlatoDAO
{
    //esta funcion recogera todos los platos de la base de datos y los metera en un array para poderlos mostrar
    public static function getAllPlatos()
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM plato");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        $listaPlatos = [];

        while ($plato = $result->fetch_object('pasta')) {
            $listaPlatos[] = $plato;
        }
        return $listaPlatos;
    }
    //esta funcion cogera todos los platos por su id_cat
    public static function getAllByType($ID_CAT)
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT ID_CAT FROM plato WHERE ID_CAT=?");
        $stmt->bind_param("i", $ID_CAT);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        $listaCategorias = [];

        while ($categoria = $result->fetch_assoc()) {
            $listaCategorias[] = $categoria['ID_CAT'];
        }

        return $listaCategorias;
    }


    //esta funcion cogera todos los platos por su id

    public static function getPlatoById($ID_PLATO)
    {
        $con = db::connect();

        $stmt = $con->prepare("SELECT * FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $ID_PLATO);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        $plato = $result->fetch_object('pasta');

        return $plato;
    }

    //esta funcion eliminara el plato por su id en concreto
    public static function eliminarPlato($ID_PLATO)
    {
        $con = db::connect();

        $stmt = $con->prepare("DELETE FROM plato WHERE ID_PLATO=?");
        $stmt->bind_param("i", $ID_PLATO);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //esta funcion sera usada para actualizar el plato a partir de un formulario
    public static function updatePlato($id_plato, $nombre, $precio, $foto)
    {
        $con = db::connect();
        $stmt = $con->prepare("UPDATE plato SET NOMBRE=?, PRECIO=?, FOTO=? WHERE ID_PLATO=?");
        $stmt->bind_param("sdsi", $nombre, $precio, $foto, $id_plato);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    //esta funcion sera usada para añadir el plato a partir de un formulario
    public static function añadirPlato($nombre, $precio, $categoria, $imagen)
    {
        // Connect to the database
        $con = db::connect();

        // Prepare the INSERT statement
        $stmt = $con->prepare("INSERT INTO plato (NOMBRE, PRECIO, ID_CAT, FOTO) VALUES (?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sdss", $nombre, $precio, $categoria, $imagen);

        // Execute the INSERT statement
        if (!$stmt->execute()) {
            return "No se pudo insertar el plato en la base de datos.";
        }
        // Get the result
        $result = $stmt->get_result();

        // Close the connection
        $con->close();

        // Return the result
        return $result;
    }
    // En tu clase PlatoDAO
    public static function añadirPedido($fecha, $cliente, $total, $selecciones, $propina, $estado)
    {
        $con = db::connect();
    
        $stmt = $con->prepare("INSERT INTO pedido (FECHA, ID_CLIENTE, TOTAL, PROPINA, ESTADO) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdii", $fecha, $cliente, $total, $propina, $estado);
    
        if (!$stmt->execute()) {
            $con->close();
            return "No se pudo insertar el pedido en la base de datos.";
        }
    
        // Obtén el ID del pedido recién insertado
        $pedidoId = $stmt->insert_id;
    
        foreach ($selecciones as $seleccion) {
            $platoId = $seleccion->getPlato()->getID_PLATO();
    
            // Validamos los valores de `ID_PLATO`
            if (!PlatoDAO::getPlatoById($platoId)) {
                $con->close();
                return "No existe el plato con ID " . $platoId;
            }
    
            $stmt = $con->prepare("INSERT INTO platos_pedido (ID_PEDIDO, ID_PLATO) VALUES (?, ?)");
            $stmt->bind_param("ii", $pedidoId, $platoId);
    
            if (!$stmt->execute()) {
                $con->close();
                return "No se pudo insertar el plato en el pedido.";
            }
        }
    
        $con->close();
    
        return $pedidoId;
    }
    
    
    
    // public static function ultimopedido($pedidoId)
    // {
    //     $con = db::connect();

    //     // Consulta para obtener información del último pedido
    //     $stmt = $con->prepare("SELECT * FROM pedido WHERE ID_PEDIDO = ?");
    //     $stmt->bind_param("i", $pedidoId);
    //     $stmt->execute();

    //     // Obtiene el resultado de la consulta
    //     $result = $stmt->get_result();

    //     // Verifica si se encontraron resultados
    //     if ($result->num_rows > 0) {
    //         // Obtiene la fila asociada al último pedido
    //         $ultimoPedidoInfo = $result->fetch_assoc();

    //         // Consulta adicional para obtener los puntos del usuario desde la tabla usuarios
    //         $stmtUsuario = $con->prepare("SELECT PUNTOS FROM usuarios WHERE ID_CLIENTE = ?");
    //         $stmtUsuario->bind_param("i", $ultimoPedidoInfo['ID_CLIENTE']);
    //         $stmtUsuario->execute();

    //         // Obtiene el resultado de la consulta de usuarios
    //         $resultUsuario = $stmtUsuario->get_result();

    //         // Verifica si se encontraron resultados en la consulta de usuarios
    //         if ($resultUsuario->num_rows > 0) {
    //             // Obtiene los puntos y los agrega a la información del último pedido
    //             $usuarioInfo = $resultUsuario->fetch_assoc();
    //             $ultimoPedidoInfo['PUNTOS'] = $usuarioInfo['PUNTOS'];
    //         } else {
    //             // No se encontraron resultados en la consulta de usuarios
    //             $ultimoPedidoInfo['PUNTOS'] = null;
    //         }

    //         // Cierra la conexión de la consulta de usuarios
    //         $stmtUsuario->close();

    //         // Consulta adicional para obtener el ID_PLATO desde la tabla platos_pedido
    //         $stmtPlato = $con->prepare("SELECT ID_PLATO FROM platos_pedido WHERE ID_PEDIDO = ?");
    //         $stmtPlato->bind_param("i", $pedidoId);
    //         $stmtPlato->execute();

    //         // Obtiene el resultado de la consulta de platos_pedido
    //         $resultPlato = $stmtPlato->get_result();

    //         // Verifica si se encontraron resultados en la consulta de platos_pedido
    //         if ($resultPlato->num_rows > 0) {
    //             // Obtiene el ID_PLATO y lo agrega a la información del último pedido
    //             $platoInfo = $resultPlato->fetch_assoc();
    //             $ultimoPedidoInfo['ID_PLATO'] = $platoInfo['ID_PLATO'];
    //         } else {
    //             // No se encontraron resultados en la consulta de platos_pedido
    //             $ultimoPedidoInfo['ID_PLATO'] = null;
    //         }

    //         // Cierra la conexión de la consulta de platos_pedido
    //         $stmtPlato->close();
    //     } else {
    //         // No se encontraron resultados
    //         $ultimoPedidoInfo = null;
    //     }

    //     // Cierra la conexión de la consulta de pedido
    //     $stmt->close();
    //     $con->close();

    //     return $ultimoPedidoInfo;
    // }
    public static function getUltimoPedidoUser($id_pedido)
    {
        $con = db::connect();
        $query = "SELECT 
            platos_pedido.ID_PLATO, 
            platos_pedido.ID_PEDIDO, 
            pedido.ID_PEDIDO,
            pedido.ID_CLIENTE,
            pedido.FECHA,
            pedido.TOTAL,
            pedido.PROPINA,
            usuarios.PUNTOS
            FROM platos_pedido
            JOIN pedido ON platos_pedido.ID_PEDIDO = pedido.ID_PEDIDO
            JOIN usuarios ON pedido.ID_CLIENTE = usuarios.ID_CLIENTE
            WHERE platos_pedido.ID_PEDIDO = ?;";
    
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id_pedido); // Bind as integer
        $stmt->execute();
        $result = $stmt->get_result();
        $detalles_pedido = array();
        while ($row = $result->fetch_assoc()) {
            //Por cada fila obtenemos los detalles del producto
            $ID_PLATO = $row['ID_PLATO'];
            $id_cliente = $row['ID_CLIENTE'];
            $ID = $row['ID_PEDIDO'];
            $fecha = $row['FECHA'];
            $precioTotal = $row['TOTAL'];
            $propina = $row['PROPINA'];
            $puntos = $row['PUNTOS'];


            //Consulta para obtener los datos del producto y ademas el objeto Producto
            $plato_pedido = PlatoDAO::getPlatoById($ID_PLATO);

            //creamos el objeto pedido con el producto y la cantidad
            $pedido = new Pedido($plato_pedido);
            $pedido->setID_CLIENTE($id_cliente);
            $pedido->setID_PEDIDO($ID);
            $pedido->setFECHA($fecha);
            $pedido->setTOTAL($precioTotal);
            $pedido->setPROPINA($propina);
            $pedido->setPUNTOS($puntos);

            //Agregamos el objeto Pedido al array de detalles
            $detalles_pedido[] = $pedido;
        }

        return $detalles_pedido;
    }
    public static function getPlatoPedido($id)
    {
        $con = db::connect();
        $query = "SELECT pedido.ID_PEDIDO FROM pedido WHERE ID_CLIENTE = ? ORDER BY pedido.ID_PEDIDO DESC LIMIT 1";

        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->store_result();

        $stmt->bind_result($pedido_ID);

        $stmt->fetch();

        return $pedido_ID;
    }
}
