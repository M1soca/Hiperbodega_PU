<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escaneo de Productos - Precio Uno</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-precio-uno">


    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center text-center">

        <!-- TITULO -->
        <h1 class="fw-bold mb-2">Escanea tus productos</h1>
        <p class="text-muted mb-4">Pasa el código de barras por el lector</p>

        <!-- FORMULARIO -->
        <form id="scanForm" method="POST" action="<?= BASE_URL ?>escaneo" class="w-100" style="max-width: 600px;">

            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#555" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-1zM4 1.5v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-1 0zm3 0v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-1 0zm3 0v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-1 0zm3-.5a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-1z"/>
                    </svg>
                </span>

                <input 
                    type="text" 
                    id="codigo" 
                    name="codigo" 
                    class="form-control text-center"
                    placeholder="Escanee el código"
                    autofocus
                    autocomplete="off"
                >
            </div>
        </form>

        <!-- MENSAJE -->
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info mt-4 w-100" style="max-width: 600px;">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- BOTÓN CARRITO -->
        <a href="<?= BASE_URL ?>carrito" class="btn-carrito btn-lg mt-4 px-4">
            Ver Carrito
        </a>

    </div>

    <script>
    // AUTO-FOCUS SIEMPRE
    const input = document.getElementById("codigo");
    window.onload = () => input.focus();

    // SUBMIT AUTOMÁTICO AL PRESIONAR ENTER
    document.getElementById("scanForm").addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            this.submit();
        }
    });
    </script>

</body>
</html>
