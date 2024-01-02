<?php
// Definimos una clase llamada db
class db
{
    // Definimos un método estático llamado connect
    public static function connect($host = '127.0.0.1', $user = 'root', $pwd = '', $db = 'bbdd_norauto')
    {
        // Intentamos establecer una nueva conexión a la base de datos
        $con = new mysqli($host, $user, $pwd, $db);
        // Si la conexión falla, detenemos el script e imprimimos un mensaje de error
        if ($con == false) {
            die('ERROR DATABASE');
        } else {
            // Si la conexión es exitosa, devolvemos el objeto de conexión
            return $con;
        }
    }
}
