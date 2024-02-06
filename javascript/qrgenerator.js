document.addEventListener("DOMContentLoaded", function () {
    let generarQRBtn = document.getElementById('generarQRBtn');
    let qrcodeContainer = document.getElementById('qrcodeContainer');
    let qrcode = document.getElementById('qrcode');
    
    generarQRBtn.addEventListener('click', function () {
        // Recuperar datos del botón usando data-* attributes
        let informacionComanda = {
            fecha: generarQRBtn.getAttribute('data-fecha'),
            productos: JSON.parse(generarQRBtn.getAttribute('data-productos')),
            precioTotal: parseFloat(generarQRBtn.getAttribute('data-precio-total')),
            // Otros datos relevantes de la comanda
        };

        // Convierte la información a cadena JSON
        let informacionComandaJSON = JSON.stringify(informacionComanda);

        // Genera el código QR usando la API de QR Code Generator
        new QRCode(qrcode, {
            text: informacionComandaJSON,
            width: 128,
            height: 128
        });

        // Muestra el contenedor del código QR
        qrcodeContainer.style.display = 'block';
    });
});
