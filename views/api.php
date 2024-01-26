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

  <script src="javascript/api.js">
  </script>
</body>

</html>