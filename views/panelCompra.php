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
  <section class="fondo">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="textocesta">
          <p>Cesta</p>
        </div>

        <?php
        $pos = 0;
        foreach ($_SESSION['selecciones'] as $pedido) { ?>
          <div class="cuadro">

            <img alt="muestra la imagen del plato seleccionado" src=<?= "fotos/" . $pedido->getPlato()->getFOTO() ?> width="120" height="120">
            <p class="p1"><?= $pedido->getPlato()->getNOMBRE() ?></p>
            <p class="p2"><?= $pedido->getPlato()->getPRECIO() ?>€</p>
            <div class="boton2">
              <form action=<?= '?controller=plato&action=compra' ?> method='post'>
                <tr>
                  <td><button class="mas" type="submit" name="Añadir" value=<?= $pos ?>> + </button></td>
                  <td><?= $pedido->getCantidad() ?></td>
                  <td><button class="menos" type="submit" name="Eliminar" value=<?= $pos ?>> - </button></td>
                </tr>
              </form>
            </div>
          </div>
        <?php
          $pos++;
        } ?>
      </div>
      <div class="col-12 col-lg-4">
        <div class="textoresumen">
          <p>Resumen</p>
        </div>
        <div class="cuadroblanco">

          <div class="articulos" id="cuadro3">
            <p class="promotext">Puntos disponibles: </p>
          </div>
          <div class="articulos">
            <p>Articulos en total (<?= count($_SESSION['selecciones']) ?>)</p>
            <p id=""><?= $precioTotal ?>€</p>

          </div>
          <div class="barra">
          </div>
          <div class="totalpedido">
            <p>Total</p>
            <p id="precioTotal"><?= $precioTotal ?>€</p>
          </div>
          <form id="qr" action="<?= '?controller=plato&action=confirmar' ?>" method='post'>
            <input id="linkqr" type="hidden" name="linkqr" value="?controller=plato&action=qrpage">
            <input type="hidden" name="cantidadFinal" value="<?= $precioTotal ?>">
            <input type="hidden" id="ID_CLIENTE" name="ID_CLIENTE" value="<?= $_SESSION['ID_CLIENTE'] ?>">
            <input type="checkbox" id="usarPuntos" name="usarPuntos">
            <label for="usarPuntos">Usar Puntos</label><br>
            <label for="propina">Propina (%)</label>
            <input type="number" id="propina" name="propina" min="1" max="100" value="3"><br>

            <button class="botonpagar" type="submit">Tramitar Pedido</button>

          </form>


          <div class="articulos">
            <?php
            $puntosAcumulados = PuntosDAO::calcularPuntosAcumulados($precioTotal, $_SESSION['ID_CLIENTE']);
            ?>
            <p>Acumularás <?= $puntosAcumulados ?> puntos con este pedido.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="volverarriba">
    <a href="#header">Volver Arriba</a>
  </section>


  <section class="bannerabajo">
    <img src="fotos/BANNERABAJO.png">
  </section>
  <script src="javascript/puntospropinas.js"></script>
  <script src="javascript/qrcode.min.js"></script>
  <script src="javascript/qrgenerator.js"></script>


</body>

</html>