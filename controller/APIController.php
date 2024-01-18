<?php
include_once 'model/comentarioDAO.php';
include_once 'model/reseñas.php';
//Esto es un NUEVO CONTROLADOR
//hacer todas las configuraciones necesarias para que funcione como controlador

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD

class APIController{    
 
    public function api(){
       
        if($_GET["accion"] == 'buscar_reseña'){
            $comentarios = ComentarioDAO::AllComentarios();
            $comentarioar = [];
            foreach ($comentarios as $comentario){
                $comentarioar[]= [
                    'ID_RESEÑA' => $comentario->getID_RESEÑA(),
                    'NOMBRE' => $comentario->getNOMBRE(),
                    'COMENTARIO' => $comentario->getCOMENTARIO(),
                    'VALORACION' => $comentario->getVALORACION(),
                ];
            }
            header('Content-Type: application/json');
            echo json_encode($comentarioar, JSON_UNESCAPED_UNICODE);
            return;
        
        }
    }
}
