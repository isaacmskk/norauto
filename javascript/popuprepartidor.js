document.addEventListener('DOMContentLoaded', function () {
    const pedidoRows = document.querySelectorAll('.pedido-row');

    pedidoRows.forEach(row => {
        row.addEventListener('click', function () {
            const id = row.dataset.id;
            const fecha = row.dataset.fecha;
            const total = row.dataset.total;

            Swal.fire({
                title: `Pedido ID: ${id}`,
                html: `
                    <p><strong>Fecha:</strong> ${fecha}</p>
                    <p><strong>Total:</strong> ${total}</p>
                `,
                icon: 'info'
            });
        });
    });
});
