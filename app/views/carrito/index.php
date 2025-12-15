<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>

    <!-- ESTILOS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-precio-uno d-flex justify-content-center align-items-center min-vh-100">

    <div class="card-carrito text-center">

        <h1 class="fw-bold mb-4">🛒 Carrito de Compra</h1>

        <?php if (empty($productos)): ?>

            <div class="alert alert-warning py-4">
                No hay productos en el carrito.
            </div>

        <?php else: ?>

            <div class="table-modern mt-3">
                <table class="table table-bordered m-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $total = 0;
                            foreach ($productos as $p): 
                                $total += $p["subtotal"];
                        ?>
                        <tr>
                            <td><?= $p['codigo']; ?></td>
                            <td><?= $p['nombre']; ?></td>
                            <td><?= $p['cantidad']; ?></td>
                            <td>S/ <?= number_format($p['precio'], 2); ?></td>
                            <td>S/ <?= number_format($p['subtotal'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="total-box text-start mt-4">
                Total a pagar: S/ <?= number_format($total, 2); ?>
            </div>

        <?php endif; ?>

        <!-- BOTONES -->
        <div class="btn-group-custom mt-4">
            <a href="<?= BASE_URL ?>escaneo" class="btn btn-secondary btn-carrito-action">
                Seguir Escaneando
            </a>
            <a href="<?= BASE_URL ?>carrito?vaciar=1" class="btn btn-danger btn-carrito-action">
                Vaciar Carrito
            </a>
            <a href="<?= BASE_URL ?>pago" class="btn btn-primary btn-carrito-action">
                Pagar
            </a>
        </div>

    </div>

</body>
</html>
