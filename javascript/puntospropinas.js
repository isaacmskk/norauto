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
    let propinaInput = document.getElementById('propina');
    let precioTotalElement = document.getElementById('precioTotal');

    checkbox.addEventListener('change', function () {
        actualizarPrecioTotal();
    });

    propinaInput.addEventListener('input', function () {
        actualizarPrecioTotal();
    });
    function actualizarPrecioTotal() {
        if (precioTotalElement) {
            let puntosDescuento = checkbox.checked ? parseFloat(document.getElementById('cuadro3').innerText.split(' ')[1]) * 0.1 : 0;
            let propina = parseFloat(propinaInput.value) || 0;
            let precioTotal = precioOriginal - puntosDescuento + (precioOriginal * propina / 100);
            precioTotalElement.innerText = `${precioTotal.toFixed(2)} €`;
        } else {
            console.error('Elemento con ID "precioTotal" no encontrado en el HTML.');
        }
    }
});
function AllPuntos(puntos) {
    let puntosInput = document.getElementById('cuadro3');
    puntosInput.innerHTML = '';
    
    let mostrar = document.createElement('p');
    mostrar.textContent = `Tienes ${puntos} puntos`;
    
    puntosInput.appendChild(mostrar);
}
