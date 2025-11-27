<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar Compra</title>
    <link rel="stylesheet" href="http://localhost:8080/precio_uno_autoservicio/public/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width: 500px;">

    <h2 class="text-center mb-4">Pagar Compra</h2>

    <div class="card p-4 shadow-sm">

        <h4 class="mb-3">Total a pagar:</h4>
        <h2 class="text-success mb-4">S/ <?= number_format($total, 2) ?></h2>

        <form method="POST" action="">
            
            <label for="monto" class="form-label">Monto entregado</label>
            <input 
                type="number" 
                step="0.10" 
                min="<?= $total ?>" 
                name="monto" 
                id="monto"
                class="form-control mb-3"
                placeholder="Ingrese el monto"
                required
                autofocus
            >

            <button class="btn btn-primary w-100 mt-3">
                Confirmar Pago
            </button>

        </form>

        <a href="http://localhost:8080/precio_uno_autoservicio/carrito" 
            class="btn btn-secondary w-100 mt-3">
            Volver al carrito
        </a>

    </div>

</div>

</body>
</html>
