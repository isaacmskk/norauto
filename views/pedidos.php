<!DOCTYPE html>
<html>

<head>
    <title>ALL PEDIDOS</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="csspedidos.css" rel="stylesheet" type="text/css" media="screen">
    <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <?php foreach ($resultado as $pedido) : ?>
        <div class="pedido row">
            <p>Pedido ID: <?= $pedido['ID_PEDIDO'] ?>
                FECHA <?= $pedido['FECHA'] ?>
                IDCLIENTE <?= $pedido['ID_CLIENTE'] ?>
                TOTAL <?= $pedido['TOTAL'] ?>
                IDPLATO <?= $pedido['ID_PLATO'] ?></p>
            <a href=<?= url . '?controller=plato&action=reseñaForm' ?>>
                <button>Reseña</button>
            </a>
        </div>
    <?php endforeach; ?>

</body>

</html>