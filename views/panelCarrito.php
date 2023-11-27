<!DOCTYPE html>
<link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
<table>
    <tr>
        <th>ID_PLATO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>INGREDIENTES</th>
        <th>FOTO</th>
        <th>PRECIO</th>
        <th>ID_CAT</th>
        <th>SELECCICONAR</th>

    </tr>
    <?php


    foreach ($_SESSION['selecciones'] as $pedido){?>

        <tr>

            <td><?= $pedido->getPlato()->getID_PLATO() ?></td>
            <td><?= $pedido->getPlato()->getNOMBRE() ?></td>
            <td><?= $pedido->getPlato()->getDESCRIPCION() ?></td>
        </tr>

    <?php
    }
    ?>
</table>

</body>


</html>