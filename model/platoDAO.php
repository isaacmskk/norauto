<?php
include_once 'config/db.php';
    class PlatoDAO {
        public static function getAllPlatos() {
            $con = db::connect(); 

                if ($result = $con->query("SELECT * FROM plato where nombre = 'hamburguesa'")) {
                    while ($row = $result->fetch_object('plato')) {
                }
        }
    }
}
?>