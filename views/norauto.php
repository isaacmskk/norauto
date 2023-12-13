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
    </ul>
  </nav>

  <section class="imagenprincipio">
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

 <section class="menuprincipal">
    <div class="todomenutexto">
      <p>Todo nuestro menú</p>
    </div>
    <div class="row">
      <div class="col-sm">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL.png" alt="Muestra una imagen de un plato de hamburguesas">
      </div>
      <div class="col-sm">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL2.png" alt="Muestra una imagen de un plato de pasta">
      </div>
      <div class="col-sm">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL3.png" alt="Muestra una imagen de un plato de paella">
      </div>
      <div class="col-sm">
        <img class="comidamenu" src="fotos/MENUENPAGINAPRINCIPAL4.png" alt="Muestra una imagen de un plato de hotdogs">
      </div>
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
  <section class="volverarriba">
    <a href="#header">Volver Arriba</a>
  </section>
  <section class="bannerabajo">
    <img src="fotos/BANNERABAJO.png">
  </section>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>