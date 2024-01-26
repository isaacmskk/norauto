<?php
include_once 'model/comentarioDAO.php';
include_once 'model/reseñas.php';
//Esto es un NUEVO CONTROLADOR
//hacer todas las configuraciones necesarias para que funcione como controlador

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD

class APIController
{

    public function api()
    {

        if ($_GET["accion"] == 'buscar_reseña') {
            $comentarios = ComentarioDAO::AllComentarios();
            $comentarioar = [];
            foreach ($comentarios as $comentario) {
                $comentarioar[] = [
                    'ID_RESEÑA' => $comentario->getID_RESEÑA(),
                    'NOMBRE' => $comentario->getNOMBRE(),
                    'COMENTARIO' => $comentario->getCOMENTARIO(),
                    'VALORACION' => $comentario->getVALORACION(),
                ];
            }
            header('Content-Type: application/json');
            echo json_encode($comentarioar, JSON_UNESCAPED_UNICODE);
            return;
        }else if ($_GET["accion"] == 'insertar') {
            // Leer los datos JSON del flujo de entrada
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
        
            // Asegúrate de que los datos necesarios están presentes
            if (isset($data['ID_CLIENTE']) && isset($data['ID_PEDIDO']) && isset($data['COMENTARIO']) && isset($data['VALORACION'])) {
                $id_cliente = $data['ID_CLIENTE'];
                $id_pedido = $data['ID_PEDIDO']; // Recoge el ID_PEDIDO de los datos enviados
                $comentario = $data['COMENTARIO'];
                $valoracion = $data['VALORACION'];
                ComentarioDAO::insertarComentario($id_cliente, $id_pedido, $comentario, $valoracion); // Pasa el ID_PEDIDO a la función
        
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Faltan datos']);
            }
            return;
        }
        
    }
}
