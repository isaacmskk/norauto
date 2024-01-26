<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ressenyes del Restaurant</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="reseñascss.css" rel="stylesheet" type="text/css" media="screen">
  <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
 
  <section class="fondorese">
    <div class="reseñas-pag row" id="reseñadas">
    </div>
  </section>
 <!-- FILTRO -->
 <div id="categories-filter">
    <label><input type="checkbox" value="1" class="category-checkbox"> Categoria 1</label>
    <label><input type="checkbox" value="2" class="category-checkbox"> Categoria 2</label>
    <label><input type="checkbox" value="3" class="category-checkbox"> Categoria 3</label>
    <label><input type="checkbox" value="4" class="category-checkbox"> Categoria 4</label>
    <label><input type="checkbox" value="5" class="category-checkbox"> Categoria 5</label>
  </div>
  <div id="orden-selector">
    <label for="orden">Orden:</label>
    <select id="orden">
      <option value="ascendente">Ascendente</option>
      <option value="descendente">Descendente</option>
    </select>
  </div>
  <form id="comentarioForm">
    <input type="hidden" id="ID_PEDIDO" name="ID_PEDIDO" value="<?php echo $_GET['ID_PEDIDO']; ?>">
    <input type="hidden" id="ID_CLIENTE" name="ID_CLIENTE" value="<?= $_SESSION['ID_CLIENTE'] ?>"><br>
    <label for="COMENTARIO">Comentario:</label><br>
    <input type="text" id="COMENTARIO" name="COMENTARIO"><br>
    <label for="VALORACION">Valoración:</label><br>
    <input type="number" id="VALORACION" name="VALORACION" min="1" max="5"><br><br>
    <input type="submit" value="Enviar">
  </form>
  <script src="javascript/api.js">
  </script>
</body>

</html>