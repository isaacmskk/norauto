<!DOCTYPE html>
<link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
<table>
    <tr>
        <th>ID_PLATO</th>
        <th>NOMBRE</th>
        <th>INGREDIENTES</th>
        <th>FOTO</th>
        <th>PRECIO</th>
        <th>ID_CAT</th>
    </tr>
    <?php
    $pos = 0;
    foreach ($_SESSION['selecciones'] as $pedido) { ?>


        <tr>
            <td><?= $pedido->getPlato()->getID_PLATO() ?></td>
            <td><?= $pedido->getPlato()->getNOMBRE() ?></td>
            <td><?= $pedido->getPlato()->getPRECIO() ?></td>
            <td><?= $pedido->getCantidad() ?></td>
            <td><?= $pedido->devuelvePrecio() ?></td>

            <form action=<?= url . '?controller=plato&action=compra' ?>method="post">
                <td><button class="" type="submit" name="Añadir" value=<?= $pos ?>> + </button></td>
                <td><button class="" type="submit" name="Eliminar" value=<?= $pos ?>> - </button></td>
            </form>
        </tr>

    <?php
        $pos++;
    } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>PRECIO FINAL PEDIDO: </td>
        <td><?= CalculadoraPrecios::calculadoraPrecioPedido($_SESSION['selecciones']) ?></td>
        <form action=<?= url . '?controller=producto&action=confirmar' ?>method='post'>
            <td><button class="" type="submit">Tramitar Pedido</button></td>

        </form>
        <td></td>
    </tr>
</table>

</body>


</html>