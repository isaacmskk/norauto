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
                <a href="#">Otoño</a>
            </li>
            <li class="ofertas">
                <a href="#">Ofertas</a>
            </li>
        </ul>
    </nav>

    <section class="menubanner">
        <img class="bannermenu" src="fotos/bannermenu.png" alt="Muestra una imagen de una comida y una oferta">
        <div class="imagenmenutexto">
            <p>Menú</p>
        </div>
    </section>

    <section class="containerplatos">
        <div class="platotexto">
            <p>Nuestros platos más pedidos</p>
        </div>
        <div class="icon">
            <img src="fotos/hamburguesaplato.png">
            <p>Hamburguesas</p>
        </div>
        <div class="icon">
            <img src="fotos\spaguetti.png">
            <p>Pasta</p>
        </div>
        <div class="icon">
            <img src="fotos\pizza.png">
            <p>Pizza</p>
        </div>
        <div class="icon">
            <img src="fotos\paella.png">
            <p>Paella</p>
        </div>
        <div class="icon">
            <img src="fotos\hot-dog.png">
            <p>Hot-dog</p>
        </div>
    </section>
    <section class="textocartas">
        <div class="carta">
            <p>Carta</p>
        </div>
    </section>


    <section class="fondomenu1 row">
    <?php
    foreach ($allPlatos as $plato) { ?>
        <article class="col-12 col-lg-3">
            <div class="imagenesmenu">
                <img src=<?= $plato->getFOTO() ?>>
                <p><?= $plato->getNOMBRE() ?> <br><?= $plato->getPRECIO() ?>€</p>
                <form action=<?="?controller=plato&action=selecciones" ?> method="POST">
                    <input name="id" value="<?= $plato->getID_PLATO() ?> " hidden>
                    <input name="categoria" value="<?= $plato->getID_CAT() ?> " hidden>
                    <button name="Añadir" class="bet-button w3-black w3-section" type="submit">Añadir</button>
                </form>
            </div>
        </article>
    <?php
    } ?>
</section>

    </section>
    <section class="volverarriba">
        <a href="#header">Volver Arriba</a>
    </section>


    <section class="bannerabajo">
        <img src="fotos/BANNERABAJO.png">
    </section>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>