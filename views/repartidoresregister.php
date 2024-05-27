<!DOCTYPE html>
<html>

<head>
    <title>Register Norauto</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="csslogin.css" rel="stylesheet" type="text/css" media="screen">
    <link href="cssconjunto.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <nav class="nav1">
        <ul>
            <li><a href="#">Cita Taller</a></li>
            <li><a href="#">Neumaticos y llantas</a></li>
            <li><a href="#">Piezas y herramientas</a></li>
            <li><a href="#">Equipamiento y mantenimiento</a></li>
            <li><a href="#">Bicicleta electrica, Moto</a></li>
            <li><a href="#">Invierno</a></li>
            <li class="ofertas"><a href="#">Ofertas</a></li>
        </ul>
    </nav>

    <section class="fondo">
        <div class="register-container">
            <div class="platotexto">
                <p>Registra al Repartidor</p>
            </div>
            <form action='?controller=repartidores&action=register' method='post'>
                <input type="text" placeholder="Nombre *" name="NOMBRE" required>
                <input type="text" placeholder="Nombre de usuario *" name="USERNAME" required>
                <input type="password" placeholder="Contraseña *" name="PASSWORD" required>
                
                <label for="METODOTRANSPORTE">Método de Transporte *</label>
                <select name="METODOTRANSPORTE" id="METODOTRANSPORTE" required>
                    <option value="BICI">Bici</option>
                    <option value="PATIN">Patín</option>
                    <option value="MOTOCICLETA">Motocicleta</option>
                </select>
                
                <label for="ROL">Rol *</label>
                <select name="ROL" id="ROL" required>
                    <option value="REPARTIDOR">Repartidor</option>
                </select>
                
                <button class="botonpagar" type="submit">Registrate</button>
            </form>
        </div>
    </section>
    <section class="volverarriba">
        <a href="#header">Volver Arriba</a>
    </section>

    <section class="bannerabajo">
        <img src="fotos/BANNERABAJO.png" alt="Banner">
    </section>
</body>

</html>
