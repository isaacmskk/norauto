<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Carrito Norauto</title>

  <meta charset="UTF-8">
  <meta name="description" content="Descripció web">
  <meta name="keywords" content="Paraules clau">
  <meta name="author" content="Autor">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="carritocss.css" rel="stylesheet" type="text/css" media="screen">

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
  <section class="fondo">
    <div class="textocesta">
      <p>Cesta</p>
    </div>
    <div class="textoresumen">
      <p>Resumen</p>
    </div>
    <?php
    $pos = 0;
    foreach ($_SESSION['selecciones'] as $pedido) { ?>
      <div class="cuadro">

        <img src=<?= $pedido->getPlato()->getFOTO() ?> width="120" height="120">
        <p class="p1"><?= $pedido->getPlato()->getNOMBRE() ?></p>
        <p class="p2"><?= $pedido->getPlato()->getPRECIO() ?>€</p>
        <div class="eliminar2">
          <img src="fotos/eliminar.png" width="32" height="32">
          <a>Eliminar</a>
        </div>
        <div class="boton2">
          <img src="fotos/botonsumar.png">
        </div>
      </div>
    <?php
      $pos++;
    } ?>
    <div class="cuadro3">
      <p class="promotext">¿Código Promocional?</p>
      <input class="formcodigo" type="search" placeholder="      Inserta el código" aria-label="Search">
      <div class="articulos">
        <p>Articulos en total (<?= count($_SESSION['selecciones']) ?>)</p>
        <p><?= $precioTotal ?>€</p>
      </div>
      <div class="barra">
      </div>
      <div class="totalpedido">
        <p>Total</p>
        <p><?= $precioTotal ?>€</p>
      </div>
      <form action="<?= '?controller=plato&action=confirmar' ?>" method='post'>
        <input type="hidden" name="cantidadFinal" value=<?= $precioTotal ?>>
        <td><button class="botonpagar" type="submit">Tramitar Pedido</button></td>
    </div>
  </section>

  <section class="volverarriba">
    <a href="#header">Volver Arriba</a>
  </section>


  <section class="bannerabajo">
    <img src="fotos/BANNERABAJO.png">
  </section>
</body>

</html>
<?php
$pos = 0;
foreach ($_SESSION['selecciones'] as $pedido) { ?>


  <tr>
    <td><?= $pedido->getPlato()->getID_PLATO() ?></td>
    <td><?= $pedido->getPlato()->getNOMBRE() ?></td>
    <td><?= $pedido->getPlato()->getPRECIO() ?></td>
    <td><?= $pedido->getCantidad() ?></td>
    <td><?= $pedido->devuelvePrecio() ?></td>

    <form action=<?= url . '?controller=plato&action=compra' ?>method='post'>
      <td><button class="" type="submit" name="Añadir" value=<?= $pos ?>> + </button></td>
      <td><button class="" type="submit" name="Eliminar" value=<?= $pos ?>> - </button></td>
    </form>
  </tr>

<?php
  $pos++;
} ?>
</body>


</html>