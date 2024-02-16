document.addEventListener('DOMContentLoaded', function () {
    let clienteid = document.getElementById('ID_CLIENTE').value; // Get the value, not the element
    document.getElementById('botonpagar').addEventListener('click', function (event) {

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
        const url = 'https://localhost/norauto/?controller=plato&action=qrpage&id=' + clienteid;
        // Genera el código QR en una nueva instancia de QRCode
        const qrCodeContainer = document.createElement('div');
        const qr = new QRCode(qrCodeContainer, {
            text: url,
            width: 300,
            height: 300,
        });
        const qrWindow = window.open('', 'Código QR', 'width=400,height=400');
        qrWindow.document.body.style.backgroundColor = '#f0f0f0';
        qrWindow.document.body.style.textAlign = 'center';

        // Agrega contenido personalizado a la ventana emergente
        qrWindow.document.body.innerHTML = `
        <h2 style="color: #333;">Código QR Generado</h2>
        <p>Escanea el código QR con tu dispositivo</p>
      `;

        // Agrega el código QR al contenido de la ventana emergente
        qrWindow.document.body.appendChild(qr._el);
    });
});

// Crea una nueva ventana emergente y muestra el código QR dentro de SweetAlert
// swal({
// //     title: '¡Código QR generado!',
// //     icon: 'success',
// //     content: {
// //         element: qrCodeContainer,
// //     },
// //     buttons: {
// //         confirm: {
// //             text: "Aceptar",
// //             value: true,
// //             visible: true,
// //             className: "swal-button--confirm",
// //         }
// //     }
// // }).then((value) => {
// //     if (value) {
// //         // Envía el formulario al backend para finalizar la compra
// //         document.getElementById('qr').submit();
// //     }
// });