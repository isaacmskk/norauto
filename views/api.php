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
  <script src="javascript/api.js">
    var id_cliente = "<?php echo $_SESSION['ID_CLIENTE']; ?>";
  </script>

  <section class="fondorese">
    <div class="reseñas-pag row" id="reseñadas">
    </div>
  </section>


  <form id="comentarioForm">
    <input type="text" id="ID_CLIENTE" name="ID_CLIENTE" value="<?= $_SESSION['ID_CLIENTE'] ?>" hidden><br>
    <label for="COMENTARIO">Comentario:</label><br>
    <input type="text" id="COMENTARIO" name="COMENTARIO"><br>
    <label for="VALORACION">Valoración:</label><br>
    <input type="number" id="VALORACION" name="VALORACION" min="1" max="5"><br><br>
    <input type="submit" value="Enviar">
  </form>
  <script>
  </script>

</body>

</html>