<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escaneo de Productos</title>
    <link rel="stylesheet" href="http://localhost:8080/precio_uno_autoservicio/public/css/bootstrap.min.css">
</head>

<body class="bg-white">

    <div class="container text-center mt-5">

        <h2>Escanea tus productos</h2>
        <p class="text-muted">Pasa el código de barras por el lector</p>

        <!-- FORMULARIO DE ESCANEO -->
        <form method="POST" action="">
            <input 
                type="text" 
                id="codigo" 
                name="codigo" 
                class="form-control text-center mt-4" 
                placeholder="Escanee el código" 
                autofocus
            >
        </form>

        <!-- MENSAJE DE RESULTADO -->
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info mt-4">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- BOTÓN AL CARRITO -->
        <a href="carrito" class="btn btn-success mt-4">
            Ver Carrito
        </a>

    </div>

</body>
</html>
