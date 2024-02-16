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
        public function mostrarPedidos()
        {
            session_start();

            if (isset($_SESSION['ID_CLIENTE'])) {
                $resultado = ComentarioDAO::obtenerPedidos($_SESSION['ID_CLIENTE']);
            }
            if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                include_once 'views/cabeceraadmin.php';
            } else {
                include_once 'views/cabecera.php';
            }
            include_once 'views/pedidos.php';
            include_once 'views/footer.php';
        } 
    }
