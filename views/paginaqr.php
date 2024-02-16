<!DOCTYPE html>
<html>

<head>
    <title>Últimos Pedidos</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción de la página">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cssconjunto.css" media="screen">
    <link rel="stylesheet" type="text/css" href="cssqr.css" media="screen">

</head>

<body>
    <h2>Últimos Pedidos</h2>

    <?php if (!empty($platos)) : ?>
        <p>Pedido ID: <?= $primerPedidoID ?></p>

        <p>Fecha: <?= $primerPedidoFecha ?></p>
        <?php foreach ($platos as $resultado) : ?>
            <p>
                ID Plato: <?= $resultado->getPlato()->getID_PLATO() ?><br>
                Nombre Plato: <?= $resultado->getPlato()->getNOMBRE() ?><br>
                Precio Plato: <?= $resultado->getPlato()->getPrecio() ?>€<br>
            </p>
        <?php endforeach; ?>

        <p>Total: <?= $resultado->getTOTAL() ?> €</p>
        <p>Propina aplicada: <?= $resultado->getPROPINA() ?> %</p>

    <?php else : ?>
        <p>No se encontró información del pedido.</p>
    <?php endif; ?>
</body>

</html>

