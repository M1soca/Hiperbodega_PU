<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autoservicio - HIPERBODEGA Precio Uno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-precio-uno">

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div class="row w-100">
            <div class="col-md-8 col-lg-6 mx-auto">

                <!-- LOGO SUPERIOR -->
                <div class="text-center mb-4">
                    <img src="<?= BASE_URL ?>public/img/logo.png" alt="Precio Uno" style="max-width: 150px;" class="logo-glow">
                </div>
                
                <div class="text-center mb-4 mt-n2">

                <div class="card shadow border-0 text-center py-4 px-3 px-md-5">

                    <div class="card-body">

                        <h6 class="text-uppercase fw-bold mb-2" style="letter-spacing: 0.5px; color: #333;">
                            HIPERBODEGA PRECIO UNO
                        </h6>

                        <h1 class="display-6 fw-bold mb-3">
                            Módulo de Autoservicio
                        </h1>

                        <p class="text-muted mb-4">
                            Escanea tus productos y paga de manera rápida y segura.
                        </p>

                        <a href="<?= BASE_URL ?>escaneo/index"
                            class="btn btn-precio-uno btn-lg px-4">
                            Comenzar compra
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </div>

</body>
</html>
