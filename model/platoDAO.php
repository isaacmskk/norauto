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

    $stmt = $con->prepare("DELETE FROM plato where ID_PLATO = ");
    $stmt->bind_param("i", $id,);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
public static function modificarPlato($ID_PLATO, $NOMBRE,$DESCRIPCION,$INGREDIENTES,$FOTO,$PRECIO,$CAT_ID) {
    $con = db::connect(); 

    $stmt = $con->prepare("UPDATE plato SET NAME = ID_PLATO = ?, NOMBRE = ?,DESCRIPCION = ?,INGREDIENTES = ?,FOTO = ?,PRECIO = ?,CAT_ID = ?, ");
    $stmt->bind_param("issssii", $id,);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
    public static function getPlatoById($id) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $ID_PLATO);
        $stmt->execute();
        $con->close();

        // $listaPlatos = [];

    //     while ($plato = $result->fetch_object($id)) {
    //             $listaPlatos[] = $id;
    //     }

    //     return $listaPlatos;
    }

    }
?>