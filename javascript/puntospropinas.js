document.addEventListener("DOMContentLoaded", function () {
    fetch('https://localhost/norauto/?controller=API&action=api&accion=buscar_puntos')
  });
  
  function AllPuntos(puntos) {
    let puntosInput = document.getElementById('cuadro3');
    puntosInput.innerHTML = '';
    let mostrar = document.getElementById('puntos');
    mostrar.textContent = `Tienes ${puntos}`;

  }
  
  document.getElementById('cliente').addEventListener('submit', function (event) {
    event.preventDefault();
  
    let ID_CLIENTE = document.getElementById('ID_CLIENTE').value;
    console.log(ID_CLIENTE)
    fetch('https://localhost/norauto/?controller=API&action=api&accion=buscar_puntos', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ ID_CLIENTE: ID_CLIENTE }),
    })
    .then(response => response.json())
    .then(puntos => {
      console.log('Success:', puntos);
      AllPuntos(puntos);
    })
    .catch((error) => {
      console.error('Error:', error);
      // Muestra un mensaje de error al usuario
      alert('Ha ocurrido un error al buscar los puntos.');
    });
  });
  