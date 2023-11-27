<?php

class CalculadoraPrecios{

    public static function calculadoraPrecioPedido($pedidos){
        $precioTotal = 0;

        foreach($pedidos as $pedido){
            $precioTotal += $pedido->devuelvePrecio();
        }

        return $precioTotal;
    }
}
?>