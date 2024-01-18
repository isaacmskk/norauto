document.addEventListener("DOMContentLoaded", function () {
    fetch('https://localhost/norauto/?controller=API&action=api&accion=buscar_reseña')

        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            AllComentarios(data);
        })
        .catch(error => console.error(error));
});

function AllComentarios(comentarios) {

    let reseñasPag = document.getElementById('reseñadas');
    console.log(reseñasPag);

    comentarios.forEach(comentario => {
        let divReseñas = document.createElement('div');
        divReseñas.classList.add('col-12', 'col-md-6', 'col-lg-3');

        divReseñas.innerHTML = `
        <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0">
            <div class = "imagenesmenu">
                <p>${estrellas(comentario.VALORACION)}</p>
                <p>${comentario.COMENTARIO}</p>
                <p>${comentario.NOMBRE}</p>
            </div>
        </div>
        `;
        // Añade el elemento creado al DOM
        reseñasPag.appendChild(divReseñas);
    });

}
const estrellas = (VALORACION) => {
    const stars = '*'.repeat(VALORACION) + 'º'.repeat(5 - VALORACION);
    return `<span style="color: gold;">${stars}</span>`;
}

// document.getElementById('form-ressenya').addEventListener('submit', function(event) {
//     event.preventDefault();

//     const numeroComanda = document.getElementById('numero-comanda').value;
//     const comentario = document.getElementById('comentario').value;
//     const valoracion = document.getElementById('valoracion').value;

//     fetch('https://localhost/norauto/?controller=Comentarios&action=afegir_ressenya', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({
//             accion: 'afegir_ressenya',
//             numero_comanda: numeroComanda,
//             comentario: comentario,
//             valoracion: valoracion,
//         }),
//     })
//         .then(response => response.json())
//         .then(data => {
//             console.log(data);
//             // Actualiza la lista de comentarios después de agregar uno nuevo
//             AllComentarios(data);
//         })
// //         .catch(error => console.error(error));
// });
