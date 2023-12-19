<?php
include_once "controller/platoController.php";
include_once 'config/db.php';
include_once 'plato.php';
include 'pasta.PHP';

class PlatoDAO
{
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

    public static function getAllByTipe($ID_CAT)
    {
        $con = db::connect();

        $stmt = $con->prepare("SELECT * FROM plato WHERE ID_CAT=?");
        $stmt->bind_param("s", $ID_CAT);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        $listaPlatos = [];
        while ($plato = $result->fetch_object($ID_CAT)) {

            $listaPlatos[] = $plato;
        }


        return $listaPlatos;
    }


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
    public static function updatePlato($id_plato, $nombre, $precio, $foto)
    {
        $con = db::connect();
        $stmt = $con->prepare("UPDATE plato SET NOMBRE=?, PRECIO=?, FOTO=? WHERE ID_PLATO=?");
        $stmt->bind_param("sdsi", $nombre, $precio, $foto, $id_plato);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
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
}
