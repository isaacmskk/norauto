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
        divReseñas.classList.add('col-12', 'col-md-6', 'col-lg-3', `VALORACION-${comentario.VALORACION}`);
        divReseñas.dataset.valoracion = comentario.VALORACION;

        divReseñas.innerHTML = `
            <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0">
                <div class = "  ">
                    <p class="estrellas">${estrellas(comentario.VALORACION)}</p>
                    <p class="comrese">${comentario.COMENTARIO}</p>
                    <p class="nomrese">${comentario.NOMBRE}</p>
                </div>
            </div>
        `;
        reseñasPag.appendChild(divReseñas);
    });
}

const estrellas = (VALORACION) => {
    const stars = '*'.repeat(VALORACION) + 'º'.repeat(5 - VALORACION);
    return `<span style="color: gold;">${stars}</span>`;
}

const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateReviews);
});

function updateReviews() {
    const selectedValoraciones = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => `VALORACION-${checkbox.value}`);

    const ordenSeleccionado = document.getElementById('orden').value;

    const allReviews = document.querySelectorAll('.col-lg-3');

    if (selectedValoraciones.length === 0) {
        allReviews.forEach(review => review.style.display = 'block');
    } else {
        allReviews.forEach(review => review.style.display = 'none');

        selectedValoraciones.forEach(VALORACION => {
            const reviewsToShow = document.querySelectorAll(`.${VALORACION}`);
            reviewsToShow.forEach(review => review.style.display = 'block');
        });
    }

    const reviewsContainer = document.getElementById('reseñadas');
    let reviewsArray = Array.from(reviewsContainer.children);

    // Ordenar las reseñas
    reviewsArray.sort((a, b) => {
        const valoracionA = parseInt(a.getAttribute('data-valoracion'), 10);
        const valoracionB = parseInt(b.getAttribute('data-valoracion'), 10);

        if (ordenSeleccionado === 'descendente') {
            return valoracionA - valoracionB;
        } else {
            return valoracionB - valoracionA;
        }
    });

    // Añadir las reseñas ordenadas al contenedor
    reviewsArray.forEach(review => {
        reviewsContainer.appendChild(review);
    });
}


const ordenSelector = document.getElementById('orden');
ordenSelector.addEventListener('change', updateReviews);

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('comentarioForm').addEventListener('submit', function (event) {
        event.preventDefault();

        let ID_CLIENTE = document.getElementById('ID_CLIENTE').value;
        let COMENTARIO = document.getElementById('COMENTARIO').value;
        let VALORACION = document.getElementById('VALORACION').value;

        let data = {
            ID_CLIENTE: ID_CLIENTE,
            COMENTARIO: COMENTARIO,
            VALORACION: VALORACION
        };
        console.log(data)
        fetch('https://localhost/norauto/?controller=API&action=api&accion=insertar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });
});
