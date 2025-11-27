<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Compra</title>
    <link rel="stylesheet" href="http://localhost:8080/precio_uno_autoservicio/public/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="text-center mb-4">Gracias por tu compra</h2>

    <div class="card p-4">

        <h4 class="mb-3">Detalle de la compra</h4>

        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= $p['nombre'] ?></td>
                    <td><?= $p['cantidad'] ?></td>
                    <td>S/ <?= number_format($p['precio'], 2) ?></td>
                    <td>S/ <?= number_format($p['subtotal'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h3 class="mt-3">Total: <strong>S/ <?= number_format($total, 2) ?></strong></h3>
        <h4 class="mt-2">Pagado: S/ <?= number_format($pagado, 2) ?></h4>
        <h4 class="mt-1">Vuelto: S/ <?= number_format($vuelto, 2) ?></h4>

    </div>

    <a href="http://localhost:8080/precio_uno_autoservicio/?nueva_compra=1" 
       class="btn btn-primary mt-4 w-100">
        Nueva Compra
    </a>

</div>

</body>
</html>
