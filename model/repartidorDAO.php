<?php
include_once 'config/db.php';
include_once 'repartidores.php';
include 'panelCompra.php';


class RepartidorDAO {
    public static function getRepartidoresDisponibles() {
        $con = db::connect();
        $query = "SELECT * FROM repartidores WHERE DISPONIBLE = 1"; // Suponiendo que DISPONIBLE es un campo que indica si el repartidor está disponible
        $result = $con->query($query);

        $repartidores = [];
        while ($row = $result->fetch_assoc()) {
            $repartidores[] = $row;
        }

        $con->close();
        return $repartidores;
    }
}
