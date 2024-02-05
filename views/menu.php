<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Menu Norauto</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="menucss.css" rel="stylesheet" type="text/css" media="screen">
    <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body>
    <nav class="nav1">
        <ul>
            <li>
                <a href="#">Cita Taller</a>
            </li>
            <li>
                <a href="#">Neumaticos y llantas</a>
            </li>
            <li>
                <a href="#">Piezas y herramientas</a>
            </li>
            <li>
                <a href="#">Equipamiento y mantenimiento</a>
            </li>
            <li>
                <a href="#">Bicicleta electrica, Moto</a>
            </li>
            <li>
                <a href="#">Invierno</a>
            </li>
            <li class="ofertas">
                <a href="#">Ofertas</a>
            </li>
            <li>
                <a href=<?= url . '?controller=Comentarios&action=reseñas' ?>>Reseñas</a>
            </li>
        </ul>
    </nav>

    <section class="menubanner">
        <img class="bannermenu" src="fotos/bannermenu.png" alt="Muestra una imagen banner de un restaurante">
        <div class="imagenmenutexto">
            <p>Menú</p>
        </div>
    </section>

    <section class="containerplatos">
        <div class="platotexto">
            <p>Nuestros platos más pedidos</p>
        </div>
        <div class="icon">
            <img src="fotos/hamburguesaplato.png" alt="imagen hamburguesa icono">
            <p>Hamburguesas</p>
        </div>
        <div class="icon">
            <img src="fotos\spaguetti.png" alt="imagen spaguetti icono">
            <p>Pasta</p>
        </div>
        <div class="icon">
            <img src="fotos\pizza.png" alt="imagen pizza icono">
            <p>Pizza</p>
        </div>
        <div class="icon">
            <img src="fotos\paella.png" alt="imagen paella icono">
            <p>Paella</p>
        </div>
        <div class="icon">
            <img src="fotos\hot-dog.png" alt="imagen hotdog icono">
            <p>Hot-dog</p>
        </div>
    </section>
    <section class="textocartas">
        <div class="carta">
            <p>Carta</p>
        </div>
    </section>

    <section class="category-filter">
        <label><input type="checkbox" class="category-checkbox" value="0"> Pasta</label>
        <label><input type="checkbox" class="category-checkbox" value="1"> Pizza</label>
        <label><input type="checkbox" class="category-checkbox" value="2"> Paella</label>
        <label><input type="checkbox" class="category-checkbox" value="3"> Hot-dog</label>
        <label><input type="checkbox" class="category-checkbox" value="4"> Hamburguesas</label>
        <button onclick="resetFilters()">Resetear Filtros</button>
    </section>
    <section class="fondomenu1 row">

        <?php
        foreach ($allPlatos as $plato) { ?>
            <article class="col-12 col-lg-3" data-categoria="<?= $plato->getID_CAT() ?>">
                <div class="imagenesmenu">
                    <img alt="imagen producto" src="<?= "fotos/" . $plato->getFOTO() ?>">
                    <p><?= $plato->getNOMBRE() ?> <br><?= $plato->getPRECIO() ?>€<br>
                        <?php if ($plato->getVegana() == 1) {
                            echo "Vegana";
                        } ?>
                    </p>

                    <form action="<?= "?controller=plato&action=selecciones" ?>" method="POST">
                        <input name="id" value="<?= $plato->getID_PLATO() ?> " hidden>
                        <input name="categoria" value="<?= $plato->getID_CAT() ?> " hidden>
                        <button class="añadirmenu" name="Añadir" class="bet-button w3-black w3-section" type="submit">
                            <img alt="imagen carrito boton pequeño" src="fotos/minicarrito.png">Añadir
                        </button>
                    </form>
                </div>
            </article>
        <?php } ?>



    </section>
    <section class="volverarriba">
        <a href="#header">Volver Arriba</a>
    </section>


    <section class="bannerabajo">
        <img src="fotos/BANNERABAJO.png" alt="imagen norauto ">
    </section>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="javascript/filtroproductos.js"></script>

</html>