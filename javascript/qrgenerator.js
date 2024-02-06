// Función para generar y mostrar el código QR
function generarQR(datos) {
    // Verifica si el elemento con id 'miQR' ya existe
    var qrContainer = document.getElementById("miQR");

    // Si el elemento no existe, crea uno nuevo
    if (!qrContainer) {
        qrContainer = document.createElement("div");
        qrContainer.id = "miQR";
        document.body.appendChild(qrContainer);
    }

    // Crea un nuevo objeto QRCode
    var qrcode = new QRCode(qrContainer, {
        text: datos,
        width: 128,
        height: 128
    });

    // Abre una nueva ventana con el código QR
    window.open("", "_blank").document.write(qrContainer.outerHTML);
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
