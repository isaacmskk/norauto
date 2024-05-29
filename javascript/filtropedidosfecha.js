document.addEventListener('DOMContentLoaded', function () {
    const historialPedidosTable = document.getElementById('historialPedidosTable');
    const fechaFilter = document.getElementById('fechaFilter');


    // Función para ordenar los pedidos por total
    function ordenarFechas() {
        const pedidosRows = Array.from(historialPedidosTable.querySelectorAll('.pedido-row'));
        pedidosRows.sort((a, b) => {
            const totalA = parseFloat(a.dataset.fecha);
            const totalB = parseFloat(b.dataset.fecha);
            return fechaFilter.value === 'fechaDesc' ? totalA - totalB : totalB - totalA;
        });
        historialPedidosTable.innerHTML = '';
        pedidosRows.forEach(row => historialPedidosTable.appendChild(row));
        // Guardar preferencia de filtro de total en localStorage
        localStorage.setItem('fechaFilter', fechaFilter.value);
    }


    // Escuchar el evento de cambio en el filtro de total
    fechaFilter.addEventListener('change', function () {
        ordenarFechas();
    });

  
    const fechaFilterGuardado = localStorage.getItem('fechaFilter');
    if (fechaFilterGuardado) {
        fechaFilter.value = fechaFilterGuardado;
    }

    // Ordenar los pedidos al cargar la página
    ordenarFechas();
});
