<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>

    <!-- ESTILOS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">Carrito de Compra</h2>

    <?php if (empty($productos)): ?>
        <div class="alert alert-warning text-center">
            No hay productos en el carrito.
        </div>
    <?php else: ?>

        <table class="table table-bordered">
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

        <h3 class="mt-4">
            Total: <strong>S/ <?= number_format($total, 2); ?></strong>
        </h3>

    <?php endif; ?>


    <!-- BOTONES DEL CARRITO -->
    <a href="<?= BASE_URL ?>escaneo" class="btn btn-secondary mt-3">
        Seguir Escaneando
    </a>
    
    <a href="<?= BASE_URL ?>carrito?vaciar=1" class="btn btn-danger mt-3">
        Vaciar Carrito
    </a>

    <a href="<?= BASE_URL ?>pago" class="btn btn-primary mt-3">
        Pagar
    </a>

</div>

</body>
</html>
