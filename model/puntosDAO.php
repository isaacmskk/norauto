<?php
include_once 'config/db.php';
include_once 'reseñas.php';
include_once 'clientes.php';

class PuntosDAO
{
    public static function AllPuntos($id_cliente)
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT PUNTOS FROM usuarios WHERE ID_CLIENTE = ?");
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $puntosactuales = $row['PUNTOS'];

        return $puntosactuales;
    }


    public static function acumularPuntos($id_cliente, $puntosAcumulados)
    {
        $con = db::connect();
        $query = "UPDATE usuarios SET PUNTOS = PUNTOS + ? WHERE ID_CLIENTE = ?";

        $stmt = $con->prepare($query);
        $stmt->bind_param("ii", $puntosAcumulados, $id_cliente);
        $stmt->execute();
    }
}
