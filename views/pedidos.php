<!DOCTYPE html>
<html>

<head>
    <title>MIS PEDIDOS</title>
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
    <h2>Mis Pedidos</h2>
    <div class="qrrr">

    </div>
    <?php foreach ($resultado as $pedido) : ?>
        <div class="pedido row">
            <p>Pedido ID: <?= $pedido['ID_PEDIDO'] ?>
                FECHA <?= $pedido['FECHA'] ?>
                TOTAL <?= $pedido['TOTAL'] ?>
                <?php if (!ComentarioDAO::existeResena($pedido['ID_PEDIDO'])) : ?>
                    <a href=<?= url . '?controller=Comentarios&action=reseñas&ID_PEDIDO=' . $pedido['ID_PEDIDO'] ?>>
                        <input type="submit" value="Reseña">
                    </a>
            </p>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <script src="javascript/puntospropinas.js"></script>
    <script src="javascript/qrcode.min.js"></script>
    <script src="javascript/qrgenerator.js"></script>
</body>

</html>