<!DOCTYPE html>
<html>

<head>
  <title>Norauto</title>

  <meta charset="UTF-8">
  <meta name="description" content="Descripció web">
  <meta name="keywords" content="Paraules clau">
  <meta name="author" content="Autor">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="indexcss.css" rel="stylesheet" type="text/css" media="screen">
  <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">


</head>
<body>
  <section class="cookie">
    <p><?= $msg_cookie ?></p>
  </section>
  <nav class="nav1 row">
    <ul>
      <li class="col">
        <a href="#">Cita Taller</a>
      </li>
      <li class="col">
        <a href="#">Neumaticos y llantas</a>
      </li>
      <li class="col">
        <a href="#">Piezas y herramientas</a>
      </li>
      <li class="col">
        <a href="#">Equipamiento y mantenimiento</a>
      </li>
      <li class="col">
        <a href="#">Invierno</a>
      </li>
      <li class="ofertas col">
        <a href="#">Ofertas</a>
      </li>
      <li>
        <a href=<?= url . '?controller=Comentarios&action=reseñas' ?>>Reseñas</a>
      </li>
      <li>
        <a href=<?= url . '?controller=repartidores&action=register' ?>>RegisterRepart</a>
      </li>
      <li>
        <a href=<?= url . '?controller=repartidores&action=login' ?>>LoginRepart</a>
      </li>
      <li>
        <a href=<?= url . '?controller=repartidores&action=profile' ?>>PerfilRepart</a>
      </li>
    </ul>
  </nav>
  

  <section class="row">
    <img class="banner1" src="fotos\banner.png" alt="Muestra una imagen de comida y una oferta">
  </section>

  <section class="fondoimagensegunda">
    <img class="imagensegunda" src="fotos\restaurante123.png" alt="Muestra una imagen de una barra de restaurante">
    <div class="encontrarplato">
      <p>Encontrar mi plato favorito</p>
    </div>
    <div class="nuestrahp">
      <img src="fotos/ham.png" alt="Muestra una imagen con texto de hamburguesas invitando a clicarla">
      <img src="fotos/nuestrapasta.png" alt="Muestra una imagen con texto de pasta invitando a clicarla">
    </div>
    <div class="fotosextra1">
      <img src="fotos/reservarmesa.png" alt="Muestra una imagen con el texto de reservar mesa">
    </div>
    <div class="fotosextra2">
      <img src="fotos/dondecomere.png" alt="Muestra una imagen con el texto ¿donde comere?">
    </div>
  </section>

  <section class="fondomenu1 row">
    <div class="todomenutexto">
      <p class="text-center">Todo nuestro menú</p>
    </div>
    <article class="col-12 col-lg-3">
      <div class="imagenesmenu">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL.png" alt="Muestra una imagen de un plato de hamburguesas">

      </div>

    </article>

    <article class="col-12 col-lg-3">
      <div class="imagenesmenu">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL2.png" alt="Muestra una imagen de un plato de pasta">

      </div>

    </article>
    <article class="col-12 col-lg-3">
      <div class="imagenesmenu">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL3.png" alt="Muestra una imagen de un plato de paella">

      </div>

    </article>
    <article class="col-12 col-lg-3">
      <div class="imagenesmenu">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL4.png" alt="Muestra una imagen de un plato de hotdogs">

      </div>

    </article>
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
  <section class="volverarriba">
    <a href="#header">Volver Arriba</a>
  </section>
  <section class="bannerabajo">
    <img src="fotos/BANNERABAJO.png">
  </section>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="javascript/puntospropinas.js"></script>
<script src="javascript/qrcode.min.js"></script>
<script src="javascript/qrgenerator.js"></script>

</html>