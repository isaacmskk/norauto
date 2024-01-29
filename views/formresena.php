<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <style>
        /* override styles here */
        .notie-container {
            box-shadow: none;
        }
    </style>
</head>
<body>
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