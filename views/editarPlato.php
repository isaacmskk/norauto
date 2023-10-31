
    <form action=<?=url."?controller=plato&action=editar"?>method="post">
        <input name="id" value="<?= $plato->getID_PLATO()?> ">
        <input name="id" value="<?= $plato->getNOMBRE()?> ">
        <input name="id" value="<?=$plato->getDESCRIPCION() ?> ">
        <input name="id" value="<?=$plato->getINGREDIENTES() ?> ">
        <input name="id" value="<?=$plato->getFOTO()?> ">
        <input name="id" value="<?=$plato->getPRECIO() ?> ">
        <input name="id" value="<?=$plato->getID_CAT() ?> ">
        <button class="bet-button w3-black w3-section" type="sumbit"></button>
    </form>
</body>
</html>
