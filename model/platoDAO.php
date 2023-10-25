<?php
include_once 'config/db.php';
    class PlatoDAO {
        public static function getAllPlatos() {
            $con = db::connect(); 

                if ($result = $con->query("SELECT * FROM plato ")) {
                    while ($plato = $result->fetch_object('plato')) {
                        echo $plato ['name'];
                        

                }
        }
    }
    public static function getAllByTipe($tipo) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM X where tipo = ?");
        $stmt->bind_param("s", $tipo,);

        $stmt->execute();
        $result = $stmt->get_result();
        $listaPlatos = [];

        while ($plato = $result->fetch_object($tipo)) {
                $listaPlatos[] = $plato;
        }

        return $listaPlatos;
    }
}

?>