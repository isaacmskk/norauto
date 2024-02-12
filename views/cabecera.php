<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
  <header id="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href=<?= url . '?controller=plato' ?>><img src="fotos/logo.png" alt="Logo Norauto" width="128" height="40"></a>
        <div class=" navbar-collapse justify-content-center" id="navbarSupportedContent">
          <form class="d-flex mx-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Busca tu plato favorito..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <img src="fotos/mispedidos.png" alt="imagen pedidos" width="30" height="30">

              <a class="nav-link" href=<?= url . '?controller=Comentarios&action=mostrarPedidos' ?> style="text-decoration:none">
                Mis pedidos
              </a>
            </li>
            <li class="nav-item">
              <img src="fotos/menu-del-restaurante (1).png" alt="imagen menu" width="30" height="30">
              <a class="nav-link" href=<?= url . '?controller=plato&action=menu' ?>>Menu</a>
            </li>

            <li class="nav-item">
              <img src="fotos/usuario.png" alt="imagen conectarse" width="30" height="30">

              <a class="nav-link" href=<?= url . '?controller=plato&action=login' ?>><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Conectarse' ?></a>
            </li>
            <li class="nav-item">
              <a href=<?= url . '?controller=plato&action=compra' ?> style="text-decoration:none">
                <img src="fotos/caarritoheader.png" alt="imagen carrito" width="40" height="40">
                <span class="colorcarrito">
                  <?= isset($_SESSION['selecciones']) ? count($_SESSION['selecciones']) : 0 ?>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

</body>

</html>