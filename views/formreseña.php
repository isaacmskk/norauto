<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form id="comentarioForm">
<input type="text" id="ID_PEDIDO" name="ID_PEDIDO" value="<?= $_SESSION['ID_PEDIDO'] ?>" hidden><br>
  <input type="text" id="ID_CLIENTE" name="ID_CLIENTE" value="<?= $_SESSION['ID_CLIENTE'] ?>" hidden><br>
  <label for="COMENTARIO">Comentario:</label><br>
  <input type="text" id="COMENTARIO" name="COMENTARIO"><br>
  <label for="VALORACION">Valoración:</label><br>
  <input type="number" id="VALORACION" name="VALORACION" min="1" max="5"><br><br>
  <a href=<?= url . '?controller=Comentarios&action=reseñas' ?>>
    <input type="submit" value="Enviar">
  </a>
</form>
<script src="javascript/api.js">
  </script>

</body>


</html>