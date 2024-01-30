<?php
include_once 'config/db.php';
include_once 'reseñas.php';
include_once 'clientes.php';
class PuntosDAO
{
    public static function AllPuntos($id_cliente)
    {
        $con = db::connect();
    
        $query = "SELECT PUNTOS FROM usuarios WHERE ID_CLIENTE = ?";
    
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id_cliente); // Asume que el ID del cliente es un entero
        $stmt->execute();
        $result = $stmt->get_result();
        $punto = [];
        while ($row = $result->fetch_object('Punto')) {
            $punto[] = $row;
        }
    
        return $punto;
    }
    
    
}