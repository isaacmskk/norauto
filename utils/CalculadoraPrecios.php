<?php
// Definimos una clase llamada CalculadoraPrecios
class CalculadoraPrecios
{
    // Definimos un método estático llamado calculadoraPrecioPedido
    public static function calculadoraPrecioPedido($pedidos)
    {
        // Inicializamos el precio total a 0
        $precioTotal = 0;
        // Recorremos cada pedido en la lista de pedidos
        foreach ($pedidos as $pedido) {
            // Sumamos el precio del pedido al precio total
            $precioTotal += $pedido->devuelvePrecio();
        }
        // Devolvemos el precio total formateado con dos decimales y separador de miles
        return number_format($precioTotal, 2, '.', ',');
    }
}
