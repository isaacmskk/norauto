<!DOCTYPE html>
<html>

<head>
    <title>Login Repartidor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="csslogin.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <div class="login-container">
        <form action='?controller=repartidores&action=login' method='post'>
            <input type="text" placeholder="Nombre de usuario" name="USERNAME" required>
            <input type="password" placeholder="Contraseña" name="PASSWORD" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>

</html>
