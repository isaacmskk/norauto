<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ressenyes del Restaurant</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="reseñascss.css" rel="stylesheet" type="text/css" media="screen">
  <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <style>
        /* override styles here */
        .notie-container {
            box-shadow: none;
        }
    </style>
    <script src="https://unpkg.com/notie"></script>

</head>

<body>
 
  <section class="fondorese">
    <div class="reseñas-pag row" id="reseñadas">
    </div>
  </section>
 <!-- FILTRO -->
 <div id="categories-filter">
    <div class="filter-option">
        <input type="checkbox" value="1" id="checkbox-1" class="category-checkbox">
        <label for="checkbox-1">1 Estrella</label>
    </div>

    <div class="filter-option">
        <input type="checkbox" value="2" id="checkbox-2" class="category-checkbox">
        <label for="checkbox-2">2 Estrellas</label>
    </div>

    <div class="filter-option">
        <input type="checkbox" value="3" id="checkbox-3" class="category-checkbox">
        <label for="checkbox-3">3 Estrellas</label>
    </div>

    <div class="filter-option">
        <input type="checkbox" value="4" id="checkbox-4" class="category-checkbox">
        <label for="checkbox-4">4 Estrellas</label>
    </div>

    <div class="filter-option">
        <input type="checkbox" value="5" id="checkbox-5" class="category-checkbox">
        <label for="checkbox-5">5 Estrellas</label>
    </div>
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
  <script src="javascript/api.js"></script>
  <script>
    document.getElementById('comentarioForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe
        notie.alert({ type: 'success', text: 'Formulario enviado con éxito', time: 2 }) // Muestra una notificación
        setTimeout(function(){ location.reload(); }, 2000); // Recarga la página después de 2 segundos
    });
</script>


</body>

</html>
