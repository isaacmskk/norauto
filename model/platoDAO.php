<?php
include_once 'config/db.php';
    class PlatoDAO {
        public static function getAllPlatos() {
            $con = db::connect(); 

                if ($result = $con->query("SELECT * FROM plato ")) {
                    while ($plato = $result->fetch_object('plato')) {
                        echo $plato ['nombre'];
                        

                }
        }else{
            return $result;
            
        }
    
}
public static function deletePlato($id) {
    $con = db::connect(); 

    $stmt = $con->prepare("DELETE FROM plato where ID_PLATO = ");
    $stmt->bind_param("i", $id,);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
public static function modificarPlato($id_plato, $NOMBRE,$DESCRIPCION,$INGREDIENTES,$FOTO,$PRECIO,$CAT_ID) {
    $con = db::connect(); 

    $stmt = $con->prepare("UPDATE plato SET NAME = ID_PLATO = ?, NOMBRE = ?,DESCRIPCION = ?,INGREDIENTES = ?,FOTO = ?,PRECIO = ?,CAT_ID = ?, ");
    $stmt->bind_param("issssii", $id,);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
    public static function getAllByTipe($tipo) {
        $con = db::connect(); 

        $stmt = $con->prepare("SELECT * FROM plato where id = ?");
        $stmt->bind_param("i", $id_plato);
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        // $listaPlatos = [];

        // while ($plato = $result->fetch_object($tipo)) {
        //         $listaPlatos[] = $plato;
        // }

        // return $listaPlatos;
    }
}

?>