<?php
include_once 'model/comentarioDAO.php';
include_once 'model/reseñas.php';
include_once 'model/clientes.php';
include_once 'model/puntosDAO.php';

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
        } else if ($_GET["accion"] == 'insertar') {
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
        } else if ($_GET["accion"] == 'buscar_puntos') {

            $puntos = []; // Define $puntos as an empty array before using it

            // Read JSON data from the input stream
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
          
            if (isset($data['ID_CLIENTE'])) {
                echo $data['ID_CLIENTE'];
                $id_cliente = $data['ID_CLIENTE'];
                $puntos = PuntosDAO::AllPuntos($id_cliente);

                $puntoar = [];

                // Verifica si $puntos es un array y no está vacío
                if (is_array($puntos) && !empty($puntos)) {
                    foreach ($puntos as $punto) {
                        $puntoar[] = [
                            'PUNTOS' => $punto->PUNTOS
                        ];
                    }
                } else {
                    // Manejar el caso en el que $puntos no es un array o está vacío
                    $puntoar = [
                        'error' => 'No se encontraron puntos para el cliente.'
                    ];
                }
            } else {

                // Manejar el caso en el que 'ID_CLIENTE' no está set en el JSON data
                echo json_encode(['error' => 'ID_CLIENTE not provided']);
                return;
            }

            header('Content-Type: application/json');
            echo json_encode($puntoar, JSON_UNESCAPED_UNICODE);
            return;
        }
    }
}
