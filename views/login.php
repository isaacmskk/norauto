<!DOCTYPE html>
<html>
<html>

<head>
    <title>Login Norauto</title>

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
            <li>
                <a href="#">Cita Taller</a>
            </li>
            <li>
                <a href="#">Neumaticos y llantas</a>
            </li>
            <li>
                <a href="#">Piezas y herramientas</a>
            </li>
            <li>
                <a href="#">Equipamiento y mantenimiento</a>
            </li>
            <li>
                <a href="#">Bicicleta electrica, Moto</a>
            </li>
            <li>
                <a href="#">Invierno</a>
            </li>
            <li class="ofertas">
                <a href="#">Ofertas</a>
            </li>
        </ul>
    </nav>

    <section class="fondo">
        <div class="login-container">
            <div class="platotexto">
                <p>¿Es la primera vez en norauto.es?</p>
            </div>
            <button type="submit">Crea tu cuenta</button>
            <div class="platotexto">
                <p>¿Ya eres cliente?</p>
            </div>
            <form action='?controller=plato&action=login' method='post'>
                <input type="text" placeholder="NIF/CIF/e-mail *" name="uname" required>
                <input type="password" placeholder="Contraseña *" name="psw" required>
                <a>¿Te has olvidado de tu contraseña?</a>
                <button type="submit">Conéctate</button>

                <p>O identifícate con</p>
                <div class="social-login">
                    <button type="button">Google</button>
                    <button type="button">Paypal</button>
                </div>
            </form>
        </div>
    </section>
    </section>
    <section class="volverarriba">
        <a href="#header">Volver Arriba</a>
    </section>


    <section class="bannerabajo">
        <img src="fotos/BANNERABAJO.png">
    </section>
</body>

</html>