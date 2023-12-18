<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?=url."?controller=plato&action=editplato"?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $plato->getID_PLATO()?>">
        <input name="nombre" value="<?= $plato->getNOMBRE()?>">
        <input name="precio" value="<?= $plato->getPRECIO()?>">
        <button class="bet-button w3-black w3-section" type="sumbit" name="edit">Editar</button>
    </form>
</body>

</html>