<?php
include_once 'config/db.php';
include_once 'reseñas.php';
class ComentarioDAO
{
    public static function AllComentarios(){
        $con = db::connect();

        $query = "SELECT reseñas.ID_RESEÑA, reseñas.ID_CLIENTE, reseñas.COMENTARIO, reseñas.VALORACION, usuarios.NOMBRE 
         FROM reseñas JOIN usuarios ON reseñas.ID_CLIENTE = usuarios.ID_CLIENTE;";

        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $comentario = [];
        while($row = $result->fetch_object('Reseña')){
            $comentario[] = $row;
        }

        return $comentario;
    }
    public static function insert($reseña)
    {
        $con = db::connect();

        $query = "INSERT INTO reseñas (ID_CLIENTE, COMENTARIO, VALORACION) VALUES (?, ?, ?)";

        $stmt = $con->prepare($query);

        // Almacena los resultados de las funciones en variables
        $idCliente = $reseña->getID_CLIENTE();
        $comentario = $reseña->getCOMENTARIO();
        $valoracion = $reseña->getVALORACION();

        // Pasa las variables a bind_param
        $stmt->bind_param("isi", $idCliente, $comentario, $valoracion);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
