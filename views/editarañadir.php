<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="menucss.css" rel="stylesheet" type="text/css" media="screen">
    <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <h2>Editar Plato Seleccionado</h2>
    <form action=<?="?controller=plato&action=editplato"?> method="POST">
        <input type="hidden" name="ID_PLATO" value="<?= $plato->getID_PLATO()?>">
        <input name="NOMBRE" value="<?= $plato->getNOMBRE()?>">
        <input name="PRECIO" value="<?= $plato->getPRECIO()?>">
        <input type="hidden" name="FOTO_ANTIQUEDA" value="<?= $plato->getFOTO()?>">
        <input type= "file" name="FOTO" value="<?= $plato->getFOTO()?>">

        <button class="bet-button w3-black w3-section" type="sumbit" name="edit">Editar</button>
    </form>
</body>

</html>