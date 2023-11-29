<!DOCTYPE html>
<link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
<table>
    <tr>
        <th>ID_PLATO</th>
        <th>NOMBRE</th>
        <th>FOTO</th>
        <th>PRECIO</th>
        <th>ID_CAT</th>

    </tr>
    <?php
        foreach ($allPlatos as $plato){ ?>

        <tr>

            <td><?= $plato->getID_PLATO() ?></td>
            <td><?= $plato->getNOMBRE() ?></td>
            <td><?= $plato->getFOTO() ?></td>
            <td><?= $plato->getPRECIO() ?></td>
            <td><?= $plato->getID_CAT() ?></td>

            <td>

                <form action=<?= url .'?controller=plato&action=selecciones' ?> method="post">
                    <input name="id" value="<?= $plato->getID_PLATO() ?> " hidden>
                    <input name="selecciones" value="<?= $plato->getID_CAT() ?> " hidden>
                    <button name="Añadir" class="bet-button w3-black w3-section" type="submit">Añadir</button>
                </form>
            </td>
        </tr>

    <?php
    }    ?>
</table>

</body>


</html>