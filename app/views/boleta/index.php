<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Compra</title>

    <!-- ESTILOS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-precio-uno d-flex justify-content-center align-items-start py-5">

<!-- PANEL PRINCIPAL -->
<div class="boleta-contenedor">

    <!-- TÍTULO -->
    <h2 class="boleta-titulo text-center mb-1">Gracias por tu compra</h2>
    <p class="boleta-fecha text-center mb-4">
        <strong>Fecha:</strong> <?= $fecha ?>
    </p>

    <!-- DETALLE -->
    <h4 class="mb-3">Detalle de la compra</h4>

    <table class="table tabla-boleta mb-4">
        <thead>
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

    <!-- MÉTODO DE PAGO -->
    <h5 class="mb-3">Método de pago</h5>

    <?php
        $nombres = [
            "yape"   => "Yape / Plin",
            "debito" => "Tarjeta Débito",
            "credito"=> "Tarjeta Crédito"
        ];

        $nombreMetodo = $nombres[$metodo] ?? "Desconocido";
        $icono = BASE_URL . "public/img/" . $metodo . ".png";
    ?>

    <div class="pago-card-boleta mb-4">
        <img src="<?= $icono ?>" alt="<?= $nombreMetodo ?>" class="icono-boleta">
        <p class="m-0 metodo-texto"><?= $nombreMetodo ?></p>
    </div>

    <!-- TOTALES -->
    <div class="totales-boleta">
        <p><strong>Total:</strong> S/ <?= number_format($total, 2) ?></p>
        <p><strong>Pagado:</strong> S/ <?= number_format($pagado, 2) ?></p>
        <p><strong>Vuelto:</strong> S/ <?= number_format($vuelto, 2) ?></p>
    </div>

    <!-- BOTÓN FINAL -->
    <a href="<?= BASE_URL ?>?nueva_compra=1" class="btn btn-precio-uno w-100 mt-4">
        Nueva Compra
    </a>

</div>

</body>
</html>

