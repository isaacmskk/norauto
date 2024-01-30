document.addEventListener("DOMContentLoaded", function () {
    fetch('https://localhost/norauto//?controller=API&action=api&accion=buscar_puntos')
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            mostrarPuntos(data);
        })
        .catch(error => console.error(error));
});

function mostrarPuntos(puntos) {
    let puntosPag = document.querySelector('.cuadro3');
    console.log(puntosPag);

    puntos.forEach(punto => {
        let pElement = document.createElement('p');
        pElement.classList.add('promotext');
        pElement.textContent = `Tienes ${punto.PUNTOS} puntos`;

        puntosPag.appendChild(pElement);
    });
}
