<?php
class ComentariosController
{
    public function reseñas()
    {
        session_start();
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

            include_once 'views/cabeceraadmin.php';
        } else {
            include_once 'views/cabecera.php';
        }
        include_once 'views/api.php';
        include_once 'views/footer.php';
    }


    // public function afegir_ressenya()
    // {
    //     // Obtén los datos de la reseña del cuerpo de la solicitud
    //     $numeroComanda = $_POST['numero_comanda'];
    //     $comentario = $_POST['comentario'];
    //     $valoracion = $_POST['valoracion'];

    //     // Verifica si ya existe una reseña para esta comanda
    //     $existingReview = ComentarioDAO::AllComentarios($numeroComanda);
    //     if ($existingReview) {
    //         // Si ya existe una reseña, envía un mensaje de error
    //         http_response_code(400);
    //         echo json_encode(['error' => 'Ya existe una reseña para esta comanda.']);
    //         return;
    //     }

    //     // Crea una nueva reseña
    //     $newReview = new Reseña();
    //     $newReview->setNumeroComanda($numeroComanda);
    //     $newReview->setComentario($comentario);
    //     $newReview->setValoracion($valoracion);

    //     // Inserta la nueva reseña en la base de datos
    //     $result = ComentarioDAO::insert($newReview);

    //     if ($result) {
    //         // Si la reseña se guardó correctamente, envía un mensaje de éxito
    //         echo json_encode(['success' => 'Reseña añadida con éxito.']);
    //     } else {
    //         // Si hubo un error al guardar la reseña, envía un mensaje de error
    //         http_response_code(500);
    //         echo json_encode(['error' => 'Hubo un error al añadir la reseña.']);
    //     }
    // }
}
