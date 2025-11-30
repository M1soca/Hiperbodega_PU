<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Compra</title>

    <!-- ESTILOS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">Gracias por tu compra</h2>
    
    <div class="text-center mb-3" style="color:#555;">
        <strong>Fecha:</strong> <?= $fecha ?>
    </div>

    <!-- ***** TARJETA DE BOLETA ***** -->
    <div class="card p-4 shadow">

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

        <!-- ===== MÉTODO DE PAGO ===== -->
        <h5 class="mt-4 mb-2">Método de pago:</h5>

        <?php
            // Creamos nombres bonitos para la boleta
            $nombres = [
                "yape"   => "Yape / Plin",
                "debito" => "Tarjeta Débito",
                "credito"=> "Tarjeta Crédito"
            ];

            // Nombre visible
            $nombreMetodo = $nombres[$metodo] ?? "Método desconocido";

            // Ruta del icono
            $icono = BASE_URL . "public/img/" . $metodo . ".png";
        ?>

        <div class="d-flex align-items-center gap-3 mt-2">

            <!-- Tarjeta única del método -->
            <div class="pago-card"
                    style="display:flex; flex-direction:column; 
                        align-items:center; padding:15px; 
                        border-radius:12px; background:#fff;
                        box-shadow:0 2px 6px rgba(0,0,0,0.15); 
                        width:150px;">

                <img src="<?= $icono ?>" 
                        alt="<?= $nombreMetodo ?>" 
                        style="width:55px; margin-bottom:8px;">

                <p class="m-0" style="font-size:16px; font-weight:600;">
                    <?= $nombreMetodo ?>
                </p>
            </div>

        </div>


        <!-- ***** TOTAL ***** -->
        <h3 class="mt-4">Total: <strong>S/ <?= number_format($total, 2) ?></strong></h3>
        <h4 class="mt-2">Pagado: S/ <?= number_format($pagado, 2) ?></h4>
        <h4 class="mt-1">Vuelto: S/ <?= number_format($vuelto, 2) ?></h4>

    </div>

    <!-- BOTÓN DE NUEVA COMPRA -->
    <a href="<?= BASE_URL ?>?nueva_compra=1" 
        class="btn btn-primary mt-4 w-100">
        Nueva Compra
    </a>

</div>

</body>
</html>
