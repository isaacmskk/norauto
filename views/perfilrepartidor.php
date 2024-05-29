<!DOCTYPE html>
<html>
<head>
    <title>Perfil del Repartidor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="profile-container">
        <h1>Perfil del Repartidor</h1>
        <form action='?controller=repartidores&action=profile' method='post'>
            <label for="NOMBRE">Nombre:</label>
            <input type="text" id="NOMBRE" name="NOMBRE" value="<?php echo $repartidor['NOMBRE']; ?>" required>

            <label for="METODOTRANSPORTE">Método de Transporte:</label>
            <select id="METODOTRANSPORTE" name="METODOTRANSPORTE" required>
                <option value="BICI" <?php echo $repartidor['METODOTRANSPORTE'] == 'BICI' ? 'selected' : ''; ?>>Bici</option>
                <option value="PATIN" <?php echo $repartidor['METODOTRANSPORTE'] == 'PATIN' ? 'selected' : ''; ?>>Patín</option>
                <option value="MOTOCICLETA" <?php echo $repartidor['METODOTRANSPORTE'] == 'MOTOCICLETA' ? 'selected' : ''; ?>>Motocicleta</option>
            </select>

            <label for="DISPONIBLE">Disponibilidad:</label>
            <input type="checkbox" id="DISPONIBLE" name="DISPONIBLE" <?php echo $repartidor['DISPONIBLE'] ? 'checked' : ''; ?>>
            <span>Disponible para entregas</span>

            <button type="submit">Actualizar Perfil</button>
        </form>

        <h2>Clima Actual</h2>
        <div class="weather-container">
            <?php if ($weather && $weather['temperature'] !== null && $weather['description'] !== null && $weather['icon'] !== null) : ?>
                <p>Temperatura: <?php echo $weather['temperature']; ?>°C</p>
                <p>Condición: <?php echo $weather['description']; ?></p>
            <?php else : ?>
                <p>No se pudo obtener la información del clima.</p>
            <?php endif; ?>
        </div>
    </div>

    <h2>Historial de Pedidos</h2>
    <form id="filterForm">
        <div>
            <label for="fechaFilter">Fecha:</label>
            <select id="fechaFilter">
                <option value="fechaAsc">Ascendente</option>
                <option value="fechaDesc">Descendente</option>
            </select>
        </div>
        <div>
            <label for="totalFilter">Total:</label>
            <select id="totalFilter">
                <option value="totalAsc">Ascendente</option>
                <option value="totalDesc">Descendente</option>
            </select>
        </div>
    </form>
    <table >
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="historialPedidosTable">
            <?php foreach ($historialPedidos as $pedido) : ?>
                <tr class="pedido-row" data-id="<?php echo $pedido['ID_PEDIDO']; ?>" data-fecha="<?php echo $pedido['FECHA']; ?>" data-id-cliente="<?php echo $pedido['ID_CLIENTE']; ?>" data-total="<?php echo $pedido['TOTAL_PEDIDO']; ?>">
                    <td><?php echo $pedido['ID_PEDIDO']; ?></td>
                    <td><?php echo $pedido['FECHA']; ?></td>
                    <td><?php echo $pedido['TOTAL_PEDIDO']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Pedidos Pendientes de Aceptar</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosPendientes as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido['ID_PEDIDO']; ?></td>
                    <td><?php echo $pedido['FECHA']; ?></td>
                    <td><?php echo $pedido['TOTAL_PEDIDO']; ?></td>
                    <td>
                        <?php if ($repartidor['DISPONIBLE']) : ?>
                            <form action="?controller=pedidos&action=aceptarPedido" method="post" style="display:inline-block;">
                                <input type="hidden" name="ID_PEDIDO" value="<?php echo $pedido['ID_PEDIDO']; ?>">
                                <input type="hidden" name="accion" value="aceptar">
                                <button type="submit">Aceptar</button>
                            </form>
                            <form action="?controller=pedidos&action=aceptarPedido" method="post" style="display:inline-block;">
                                <input type="hidden" name="ID_PEDIDO" value="<?php echo $pedido['ID_PEDIDO']; ?>">
                                <input type="hidden" name="accion" value="rechazar">
                                <button type="submit">Rechazar</button>
                            </form>
                        <?php else : ?>
                            <span>No disponible para aceptar pedidos</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="javascript/popuprepartidor.js"></script>
    <script src="javascript/filtropedidosfecha.js"></script>
    <script src="javascript/filtropedidostotal.js"></script>
</body>
</html>