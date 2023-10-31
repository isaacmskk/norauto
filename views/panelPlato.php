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
        <th>Modificar</th>
        <th>Eliminar</th>

    </tr>
    <?php


    foreach ($allPlatos as $plato) : ?>

        <tr>

            <td><?= $plato->getID_PLATO() ?></td>
            <td><?= $plato->getNOMBRE() ?></td>
            <td><?= $plato->getDESCRIPCION() ?></td>
            <td><?= $plato->getINGREDIENTES() ?></td>
            <td><?= $plato->getFOTO() ?></td>
            <td><?= $plato->getPRECIO() ?></td>
            <td><?= $plato->getID_CAT() ?></td>


            <td>
    <form action="<?= url ?>?controller=plato&action=editar" method="post">
        <input name="ID_PLATO" value="<?= $plato->getID_PLATO() ?> " hidden>
        <input name="NOMBRE" value="<?= $plato->getNOMBRE() ?> " hidden>
        <button name="modificar" class="bet-button w3-black w3-section" type="submit">Modificar</button>
    </form>
</td>

<td>
    <form action="<?= url ?>?controller=plato&action=eliminar" method="post">
        <input name="eliminar" value="<?= $plato->getID_PLATO() ?> " hidden>
        <button name="eliminar" class="bet-button w3-black w3-section" type="submit">Eliminar</button>
    </form>
</td>
</tr>

        <?php 
        endforeach;
 ?>
</table>

</body>


</html>