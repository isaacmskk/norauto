document.addEventListener("DOMContentLoaded", function () {
    let ID_CLIENTE = document.getElementById('ID_CLIENTE').value;
    let puntos = {
        ID_CLIENTE: ID_CLIENTE
    };

    fetch('https://localhost/norauto/?controller=API&action=api&accion=buscar_puntos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(puntos),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        AllPuntos(data.puntos);
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Ha ocurrido un error al buscar los puntos.');
    });

    let precioOriginal = parseFloat(document.getElementById('precioTotal').innerText.split('€')[0]);
    let checkbox = document.getElementById('usarPuntos');
    let precioTotalElement = document.getElementById('precioTotal');

    checkbox.addEventListener('change', function () {
        if (precioTotalElement) {
            if (this.checked) {
                let puntosDescuento = parseFloat(document.getElementById('cuadro3').innerText.split(' ')[1]);
                let descuento = puntosDescuento * 0.1;
                let precioTotal = precioOriginal - descuento;
                precioTotalElement.innerText = `${precioTotal.toFixed(2)} €`;
            } else {
                // Checkbox desmarcado, restaurar el precio original
                precioTotalElement.innerText = `${precioOriginal.toFixed(2)} €`;
            }
        } else {
            console.error('Elemento con ID "precioTotal" no encontrado en el HTML.');
        }
    });
});

function AllPuntos(puntos) {
    let puntosInput = document.getElementById('cuadro3');
    puntosInput.innerHTML = '';
    
    let mostrar = document.createElement('p');
    mostrar.textContent = `Tienes ${puntos} puntos`;
    
    puntosInput.appendChild(mostrar);
}
