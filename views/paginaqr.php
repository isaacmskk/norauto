<!DOCTYPE html>
<html>

<head>
    <title>Último Pedido</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción de la página">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cssconjunto.css" media="screen">
    <link rel="stylesheet" type="text/css" href="cssqr.css" media="screen">

</head>

<body>
    <h2>Último Pedido</h2>
    <?php if ($resultado !== null) : ?>
        <div class="pedido row">
            <p>
                ID del pedido: <?= $resultado['ID_PEDIDO'] ?><br>
                Fecha del pedido: <?= $resultado['FECHA'] ?><br>
                ID CLIENTE: <?= $resultado['ID_CLIENTE'] ?><br>
                ID PLATO: <?= $resultado['ID_PLATO'] ?><br>
                Total del pedido: <?= $resultado['TOTAL'] ?> €<br>
                Tus puntos: <?= $resultado['PUNTOS'] ?><br>
                Propina aplicada: <?= $resultado['PROPINA'] ?> %


            </p>
        </div>
    <?php else : ?>
        <p>No se encontró información del pedido.</p>
    <?php endif; ?>

    <script src="javascript/qrgenerator.js"></script>
</body>

</html>
