<form action="<?= url ?>?controller=plato&action=editar" method="post">
    <input name="id_plato" value="<?= $plato->getID_PLATO() ?> ">
    <input name="nombre" value="<?= $plato->getNOMBRE() ?> ">
    <input name="descripcion" value="<?= $plato->getDESCRIPCION() ?> ">
    <input name="ingredientes" value="<?= $plato->getINGREDIENTES() ?> ">
    <input name="foto" value="<?= $plato->getFOTO() ?> ">
    <input name="precio" value="<?= $plato->getPRECIO() ?> ">
    <input name="id_cat" value="<?= $plato->getID_CAT() ?> ">
    <button class="bet-button w3-black w3-section" type="submit">Enviar</button>
</form>
