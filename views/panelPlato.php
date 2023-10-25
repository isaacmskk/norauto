<?php
include_once 'controller/platoController.php';
foreach ($allPlatos as $plato){ ?>
    <tr>
    <td></td>
    <td><?=$plato->getID()?></td>
    <td><?=$plato->getNombre() ?></td>
    <td><?=$plato->getDescripcion() ?></td>
    <td><?=$plato->getIngredientes() ?></td>
    <td><?=$plato->get() ?></td>
    <td><?=$plato->getDescripcion() ?></td>
    <td><?=$plato->getDescripcion() ?></td>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA PLATOS</title>
</head>
<body>

<td>
    <form action=<?=url."?controller=plato&action=modificar"?>method="post">
        <input name="id" value="modificar">
        <input name="id" value="<?= $plato->getID()?> "hidden>
        <button class="bet-button w3-black w3-section" type="sumbit"></button>
    </form>
</td>
<td>
    <form action=<?=url."?controller=plato&action=eliminar"?>method="post">
        <input name="id" value="<?= $plato->getID()?> "hidden>
        <button class="bet-button w3-black w3-section" type="sumbit"></button>
    </form>
</td>


    
</body>
<?php }?>

</html>

