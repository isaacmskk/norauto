// Función para generar y mostrar el código QR
function generarQR(datos) {
    // Verifica si el elemento con id 'cuadro3' ya existe
    var qrContainer = document.getElementById("cuadro3");

    // Si el elemento no existe, crea uno nuevo y lo agrega al final del body
    if (!qrContainer) {
        qrContainer = document.createElement("div");
        qrContainer.id = "cuadro3";
        document.body.appendChild(qrContainer);
    }

    // Limpia el contenido existente del contenedor antes de generar un nuevo código QR
    qrContainer.innerHTML = "";

    // Crea un nuevo objeto QRCode
    var qrcode = new QRCode(qrContainer, {
        text: datos,
        width: 128,
        height: 128
    });
}



// Manejador de evento para el envío del formulario
document.getElementById("qr").addEventListener("submit", function (event) {
    // Obtiene los datos del campo cantidadFinal
    var datosInput = document.getElementById("cantidadFinal");

    // Verifica si el elemento existe antes de intentar acceder a su valor
    if (datosInput) {
        var datos = datosInput.value;

        // Genera y muestra el código QR
        generarQR(datos);
    } else {
        console.error("Elemento con id 'cantidadFinal' no encontrado.");
    }
});
