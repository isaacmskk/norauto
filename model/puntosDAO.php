<?php
include_once 'config/db.php';
include_once 'reseñas.php';
include_once 'clientes.php';

class PuntosDAO
{
    public static function AllPuntos($id_cliente)
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT PUNTOS FROM usuarios WHERE ID_CLIENTE = ?");
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $puntosactuales = $row['PUNTOS'];
    
        // Devuelve solo los puntos, no el ID_CLIENTE
        return $puntosactuales;
    }
    public static function actualizarPuntos($id_cliente, $nuevosPuntos)
{
    $con = db::connect();

    $stmt = $con->prepare("UPDATE usuarios SET PUNTOS = ? WHERE ID_CLIENTE = ?");
    $stmt->bind_param("ii", $nuevosPuntos, $id_cliente);
    
    if (!$stmt->execute()) {
        $con->close();
        return "No se pudo actualizar los puntos del cliente en la base de datos.";
    }

    $con->close();
    return "Puntos actualizados correctamente en la base de datos.";
}
public static function acumularPuntosPorCompra($id_cliente, $total)
{
    // Establece la tasa de conversión de puntos basada en el gasto 
    $tasaConversion = 0.2;

    // Calcula la cantidad de puntos a acumular
    $puntosAcumulados = round($total * $tasaConversion);

    // Obtén los puntos actuales del cliente
    $puntosActuales = self::AllPuntos($id_cliente);

    // Actualiza los puntos del cliente sumando los puntos acumulados
    $nuevosPuntos = $puntosActuales + $puntosAcumulados;
    self::actualizarPuntos($id_cliente, $nuevosPuntos);

    return $puntosAcumulados;
}
//puntos que ganaras con el total de tu compra
public static function calcularPuntosAcumulados($total, $id_cliente)
{
    // Establece la tasa de conversión de puntos basada en el gasto (por ejemplo, 1 euro = 1 punto)
    $tasaConversion = 0.2;

    // Calcula la cantidad de puntos a acumular
    $puntosAcumulados = round($total * $tasaConversion);

    return $puntosAcumulados;
}

}
