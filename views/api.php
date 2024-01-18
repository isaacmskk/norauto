<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ressenyes del Restaurant</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="menucss.css" rel="stylesheet" type="text/css" media="screen">
  <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
  <!-- <form id="form-ressenya">
    <input type="number" id="numero-comanda" placeholder="Número de comanda" required>
    <textarea id="comentario" placeholder="Comentario" required></textarea>
    <input type="number" id="valoracion" placeholder="Valoración (1-5)" min="1" max="5" required>
    <button type="submit">Enviar reseña</button>
</form> -->
  <section>
    <div class="reseñas-pag row" id="reseñadas">
    </div>
  </section>
  <script src="javascript/api.js"></script>

</body>

</html>
<!-- <!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ressenyes del Restaurant</title>
</head>

<body>
  <div>
    <h1>Ressenyes del Restaurant</h1>
      <div class="reviews">
        {ressenyes.map((ressenya) => (
          <div key={ressenya.id}>
            <h2>{ressenya.nota}/5</h2>
            <p>{ressenya.comentari}</p>
          </div>
        ))}
      </div>
      <div class="filters">
        <input type="number" placeholder="Nota mínima" value={notaMinima} onChange={setNotaMinima} />
        <select value={ordenacio} onChange={setOrdenacio}>
          <option value="asc">Ascendent</option>
          <option value="desc">Descendent</option>
        </select>
      </div>
      <form onSubmit={afegirRessenya}>
        <input type="number" placeholder="Nota" ref={nota} />
        <input type="number" placeholder="Número de comanda" ref={comanda} />
        <textarea placeholder="Comentari" ref={comentari}></textarea>
        <button>Afegir ressenya</button>
      </form> -->

<!-- <script src="../api.js">

    </script>
</body>

</html>  -->