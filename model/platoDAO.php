<?php
include_once "controller/platoController.php";
include_once 'config/db.php';
include_once 'plato.php';
include 'pasta.PHP';

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
        $stmt = $con->prepare("SELECT DISTINCT NOMBRE_CATEGORIA FROM plato WHERE ID_CAT=?");
        $stmt->bind_param("s", $ID_CAT);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        $listaCategorias = [];
    
        while ($categoria = $result->fetch_assoc()) {
            $listaCategorias[] = $categoria['NOMBRE_CATEGORIA'];
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
    public static function añadirPedido($fecha, $cliente, $total, $selecciones)
    {
        $con = db::connect();

        $stmt = $con->prepare("INSERT INTO pedido (FECHA, ID_CLIENTE, TOTAL) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $fecha, $cliente, $total);

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

        return $pedidoId; // Retorna el ID del pedido
    }
}
