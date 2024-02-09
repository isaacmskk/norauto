<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="menucss.css" rel="stylesheet" type="text/css" media="screen">
    <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <h2>Panel admin</h2>
    <section class="fondomenu1 row">
        <?php
        foreach ($allPlatos as $plato) { ?>
            <article class="col-12 col-lg-3">
                <div class="imagenesmenu">
                    <img alt="imagen producto" src=<?="fotos/".$plato->getFOTO() ?>>
                    <p><?= $plato->getNOMBRE() ?> <br><?= $plato->getPRECIO() ?>€</p>

                    <form action=<?="?controller=plato&action=eliminar"?> method="POST">
                        <input name="ID_PLATO" value="<?= $plato->getID_PLATO() ?> " hidden>
                        <input name="categoria" value="<?= $plato->getID_CAT() ?> " hidden>
                        <button class="añadirmenu" name="eliminar" class="bet-button w3-black w3-section" type="submit">Eliminar</button>
                    </form>

                    <form action=<?="?controller=plato&action=edit"?> method="POST">
                        <input name="ID_PLATO" value="<?= $plato->getID_PLATO() ?> " hidden>
                        <input name="categoria" value="<?= $plato->getID_CAT() ?> " hidden>
                        <button class="añadirmenu" name="editar" class="bet-button w3-black w3-section" type="submit">Editar</button>
                    </form>


                </div>
            </article>

        <?php
        } ?>
        </section>
        <form class="formañadir" action=<?="?controller=plato&action=añadir"?> method="POST">
            <input type="text" name="NOMBRE" placeholder="NOMBRE"><br>
            <input type="float" name="PRECIO" placeholder="PRECIO"><br>
            <select name="CAT_ID">
                <option value="0">0-pasta</option>
                <option value="1">1-pizzas</option>
                <option value="2">2-paellas</option>
                <option value="3">3-hotdogs</option>
                <option value="4">4-hamburguesas</option>

            </select><br>
            <input type="file" name="FOTO"><br>
            <button class="buttonañadir" type="submit" name="añadir">Crear</button>
        </form>
    
</body>

</html>