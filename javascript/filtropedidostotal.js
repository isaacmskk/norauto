document.addEventListener('DOMContentLoaded', function () {
    const historialPedidosTable = document.getElementById('historialPedidosTable');
    const totalFilter = document.getElementById('totalFilter');


    // Función para ordenar los pedidos por total
    function ordenarPedidosPorTotal() {
        const pedidosRows = Array.from(historialPedidosTable.querySelectorAll('.pedido-row'));
        pedidosRows.sort((a, b) => {
            const totalA = parseFloat(a.dataset.total);
            const totalB = parseFloat(b.dataset.total);
            return totalFilter.value === 'totalDesc' ? totalA - totalB : totalB - totalA;
        });
        historialPedidosTable.innerHTML = '';
        pedidosRows.forEach(row => historialPedidosTable.appendChild(row));
        // Guardar preferencia de filtro de total en localStorage
        localStorage.setItem('filtroTotal', totalFilter.value);
    }


    // Escuchar el evento de cambio en el filtro de total
    totalFilter.addEventListener('change', function () {
        ordenarPedidosPorTotal();
    });

  
    const filtroTotalGuardado = localStorage.getItem('filtroTotal');
    if (filtroTotalGuardado) {
        totalFilter.value = filtroTotalGuardado;
    }

    // Ordenar los pedidos al cargar la página
    ordenarPedidosPorTotal();
});
