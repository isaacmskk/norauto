<?php
include_once "controller/platoController.php";
include_once 'config/db.php';
include_once 'plato.php';

class PlatoDAO {
    public static function getAllPlatos() {
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM plato");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        $listaPlatos = [];

        while ($plato = $result->fetch_object('plato')) {
            $listaPlatos[] = $plato;
        }
        return $listaPlatos;
    }

    public static function deletePlato($id) {
        $con = db::connect(); 

        $stmt = $con->prepare("DELETE FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    // public static function editarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $CAT_ID) {
    //     $con = db::connect(); 

    //     $stmt = $con->prepare("UPDATE plato SET ID_PLATO = ?, NOMBRE = ?, DESCRIPCION = ?, FOTO = ?, PRECIO = ?, CAT_ID = ? WHERE ID_PLATO = ?");
    //     $stmt->bind_param("isssii", $ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $CAT_ID, $ID_PLATO);

    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     return $result;
    // }
    public static function seleccionarPlato($ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $CAT_ID) {
        $con = db::connect(); 

        $stmt = $con->prepare("UPDATE plato SET ID_PLATO = ?, NOMBRE = ?, DESCRIPCION = ?, FOTO = ?, PRECIO = ?, CAT_ID = ? WHERE ID_PLATO = ?");
        $stmt->bind_param("isssii", $ID_PLATO, $NOMBRE, $DESCRIPCION, $FOTO, $PRECIO, $CAT_ID, $ID_PLATO);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
    public static function getPlatoById($id) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        $plato = $result->fetch_object('plato');

        return $plato;
    }
}
?>
