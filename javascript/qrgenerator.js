document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('qr').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
        const url = 'https://localhost/norauto/?controller=plato&action=qrpage';

        // Genera el código QR en una nueva instancia de QRCode
        const qr = new QRCode(document.createElement('div'), {
            text: url,
            width: 300,
            height: 300,
        });

        // Crea una nueva ventana emergente y muestra el código QR
        const qrWindow = window.open('', 'Código QR', 'width=400,height=400');
        qrWindow.document.body.appendChild(qr._el);

        // Envía el formulario al backend para finalizar la compra
        this.submit();
    });
});

// // Función para generar y mostrar el código QR
// function generarQR(datos) {
//     // Verifica si el elemento con id 'cuadro4' ya existe
//     var qrContainer = document.getElementById("cuadro4");

//     // Si el elemento no existe, crea uno nuevo y lo agrega al final del body
//     if (!qrContainer) {
//         qrContainer = document.createElement("div");
//         qrContainer.id = "cuadro4";
//         document.body.appendChild(qrContainer);
//     }

//     // Limpia el contenido existente del contenedor antes de generar un nuevo código QR
//     qrContainer.innerHTML = "";

//     // Asegúrate de que datos sea una URL válida
//     var datosURL = validarURL(datos);

//     // Crea un nuevo objeto QRCode
//     var qrcode = new QRCode(qrContainer, {
//         text: datosURL,
//         width: 128,
//         height: 128
//     });
// }

// // Función para validar y formatear una URL
// function validarURL(url) {
//     // Agrega "http://" si la URL no comienza con eso o "https://"
//     if (!url.startsWith('http://') && !url.startsWith('https://localhost/norauto/')) {
//         url = 'https://localhost/norauto/' + url;
//     }
//     return url;
// }

// // Manejador de evento para el envío del formulario
// document.getElementById("qr").addEventListener("submit", function (event) {
//     // Evita que el formulario se envíe y recargue la página
//     event.preventDefault();

//     // Obtiene los datos del campo cantidadFinal
//     var datosInput = document.getElementById("linkqr");

//     // Verifica si el elemento existe antes de intentar acceder a su valor
//     if (datosInput) {
//         var datos = datosInput.value;

//         // Construye la URL con los parámetros necesarios
//         var url = '?controller=plato';

//         // Abre una nueva ventana con la URL que incluye los parámetros
//         var nuevaVentana = window.open(url);

//         // Genera y muestra el código QR en la nueva ventana
//         if (nuevaVentana) {
//             nuevaVentana.onload = function() {
//                 nuevaVentana.generarQR(datos);
//             };
//         } else {
//             console.error("No se pudo abrir la nueva ventana.");
//         }
//     } else {
//         console.error("Elemento con id 'linkqr' no encontrado.");
//     }
// });

