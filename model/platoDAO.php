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

    public static function getAllByTipe($ID_CAT) {
        $con = db::connect();

        $stmt = $con->prepare("SELECT * FROM plato WHERE ID_CAT=?");
        $stmt->bind_param("s", $ID_CAT);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        $listaPlatos =[];
        while ($plato = $result->fetch_object($ID_CAT)) {
          
            $listaPlatos[] = $plato;
        }

       
        return $listaPlatos;
    }

    public static function seleccionarPlato($ID_PLATO, $NOMBRE, $FOTO, $PRECIO, $ID_CAT) {
        $con = db::connect(); 
    
        $stmt = $con->prepare("UPDATE plato SET NOMBRE = ?, FOTO = ?, PRECIO = ?, ID_CAT = ? WHERE ID_PLATO = ?");
        $stmt->bind_param("sssii", $NOMBRE, $FOTO, $PRECIO, $ID_CAT, $ID_PLATO);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result;
    }
    
    public static function getPlatoById($ID_PLATO,$ID_CAT) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $ID_PLATO);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        $plato = $result->fetch_object($ID_CAT);

        return $plato;
    }
}
?>
