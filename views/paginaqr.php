<!DOCTYPE html>
<html>

<head>
    <title>Último Pedido</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción de la página">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cssconjunto.css" media="screen">
</head>

<body>
    <h2>Último Pedido</h2>
    <?php if ($resultado !== null) : ?>
        <div class="pedido row">
            <p>
                Pedido ID: <?= $resultado['ID_PEDIDO'] ?><br>
                FECHA: <?= $resultado['FECHA'] ?><br>
                ID CLIENTE: <?= $resultado['ID_CLIENTE'] ?><br>
                ID PLATO: <?= $resultado['ID_PLATO'] ?><br>
                TOTAL: <?= $resultado['TOTAL'] ?> €<br>
                PUNTOS: <?= $resultado['PUNTOS'] ?><br>
                Propina aplicada: <?= $resultado['PROPINA'] ?> %


            </p>
        </div>
    <?php else : ?>
        <p>No se encontró información del pedido.</p>
    <?php endif; ?>

    <script src="javascript/qrgenerator.js"></script>
</body>

</html>
