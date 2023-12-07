<?php
include_once "controller/platoController.php";
include_once 'config/db.php';
include_once 'plato.php';
include 'pasta.PHP';

class PlatoDAO {
    public static function getAllPlatos() {
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

    
    public static function getPlatoById($ID_PLATO) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM plato where ID_PLATO = ?");
        $stmt->bind_param("i", $ID_PLATO);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        $plato = $result->fetch_object('pasta');

        return $plato;
    }
}
?>
