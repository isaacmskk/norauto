
document.addEventListener("DOMContentLoaded", function () {
    const reviewsContainer = document.getElementById("reviewsContainer");
    const filterRating = document.getElementById("filterRating");
    const sortOrder = document.getElementById("sortOrder");
    const reviewForm = document.getElementById("reviewForm");
  
    // Función para cargar y mostrar las resenhas
    function loadReviews() {
      axios.get("api.php")
        .then(response => {
          console.log("Respuesta de la API:", response.data); // Agrega esta línea para depurar
  
          // Resto del código...
  
          const resenyesOriginal = response.data; // Guardar la llista original
          renderResenyes(resenyesOriginal);
        })
        .catch(error => console.error("Error al obtener las reseñas:", error));
    }
  
    // Cargar reseñas al cargar la página
    loadReviews();
  
    // Evento de cambio en el filtro y orden
    filterRating.addEventListener("change", loadReviews);
    sortOrder.addEventListener("change", loadReviews);
  
    // Evento de envío del formulario para agregar resenhas
    reviewForm.addEventListener("submit", function (event) {
      event.preventDefault();
  
      // Obtener datos del formulario
      const orderNumber = document.getElementById("orderNumber").value;
      const userName = document.getElementById("userName").value;
      const reviewText = document.getElementById("reviewText").value;
      const rating = document.getElementById("rating").value;
  
      // Enviar datos a la API para agregar la resenha
      axios.post("api.php", {
        orderNumber: orderNumber,
        userName: userName,
        reviewText: reviewText,
        rating: rating
      })
        .then(response => {
          // Mostrar mensaje de éxito
          notie.alert({ type: "success", text: "Resenha agregada correctamente" });
          // Limpiar el formulario
          reviewForm.reset();
          // Recargar las resenhas
          loadReviews();
        })
        .catch(error => {
          console.error("Error al agregar la resenha:", error);
          // Mostrar mensaje de error
          notie.alert({ type: "error", text: "Error al agregar la resenha" });
        });
    });
  });
  
  // Función para renderizar las resenhas
  function renderResenyes(resenyes) {
    const resenyesContainer = document.getElementById("resenyes-container");
    const filtreNota = document.getElementById("filtre-nota");
    resenyesContainer.innerHTML = ""; // Netegem el contingut actual
    resenyes.forEach(resenya => {
      const { usuari, comentari, puntuacio } = resenya;
      const resenyaHTML = `
        <div>
          <strong>${usuari}</strong>
          <p>${comentari}</p>
          <p>Puntuació: ${puntuacio}</p>
        </div>
        <hr>
      `;
      resenyesContainer.innerHTML += resenyaHTML;
    });
  }
  