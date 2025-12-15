<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar Compra</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
</head>

<body class="bg-precio-uno d-flex justify-content-center align-items-center min-vh-100">

<!-- ============================
     PANEL BLANCO PRINCIPAL
============================ -->
<div class="card-pago-principal text-center">

    <!-- TITULO -->
    <h1 class="titulo-pago mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#d41c2c" viewBox="0 0 16 16" class="me-2">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3h16v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm3.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm9 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
        </svg>
        Pagar Compra
    </h1>

    <!-- TOTAL -->
    <div class="total-box-pago mb-4 mx-auto">
        <p class="fw-semibold text-dark mb-1">Total a pagar:</p>
        <h1 class="text-success fw-bold display-5 m-0">S/ <?= number_format($total, 2) ?></h1>
    </div>

    <!-- SUBTITULO -->
    <h4 class="text-secondary fw-bold mb-4">Seleccione método de pago</h4>

    <!-- OPCIONES DE PAGO -->
    <div class="d-flex justify-content-center gap-4 flex-wrap mb-4">

        <div class="pago-card" data-metodo="yape">
            <img src="<?= BASE_URL ?>public/img/yape.png" class="pago-icon">
            <p>Yape / Plin</p>
        </div>

        <div class="pago-card" data-metodo="debito">
            <img src="<?= BASE_URL ?>public/img/debito.png" class="pago-icon">
            <p>Tarjeta Débito</p>
        </div>

        <div class="pago-card" data-metodo="credito">
            <img src="<?= BASE_URL ?>public/img/credito.png" class="pago-icon">
            <p>Tarjeta Crédito</p>
        </div>

    </div>


    <!-- AREA DE FORMULARIOS -->
    <div class="form-pago-contenedor">

        <!-- YAPE -->
        <div id="form-yape" class="form-pago" style="display:none;">
            <h5 class="fw-bold mb-3">Paga con Yape / Plin</h5>
            <p>Escanea el siguiente QR:</p>

            <img src="<?= BASE_URL ?>public/img/qr-code.png" class="qr-img mb-3">

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="yape">
                <button class="btn btn-primary w-100 btn-pago">Confirmar Pago</button>
            </form>
        </div>

        <!-- DEBITO -->
        <div id="form-debito" class="form-pago" style="display:none;">
            <h5 class="fw-bold mb-3">Tarjeta Débito</h5>

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="debito">
                <input type="text" class="form-control mb-2" placeholder="Número de tarjeta" required>
                <input type="text" class="form-control mb-2" placeholder="MM/AA" required>
                <input type="password" class="form-control mb-3" placeholder="CVV" required>

                <button class="btn btn-primary w-100 btn-pago">Confirmar Pago</button>
            </form>
        </div>

        <!-- CREDITO -->
        <div id="form-credito" class="form-pago" style="display:none;">
            <h5 class="fw-bold mb-3">Tarjeta Crédito</h5>

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="credito">
                <input type="text" class="form-control mb-2" placeholder="Número de tarjeta" required>
                <input type="text" class="form-control mb-2" placeholder="MM/AA" required>
                <input type="password" class="form-control mb-3" placeholder="CVV" required>

                <button class="btn btn-primary w-100 btn-pago">Confirmar Pago</button>
            </form>
        </div>
    </div>

</div>

<!-- SCRIPT -->
<script>
    const cards = document.querySelectorAll(".pago-card");
    const forms = {
        yape: document.getElementById("form-yape"),
        debito: document.getElementById("form-debito"),
        credito: document.getElementById("form-credito")
    };

    cards.forEach(card => {
        card.addEventListener("click", () => {
            const metodo = card.getAttribute("data-metodo");

            Object.values(forms).forEach(f => f.style.display = "none");
            cards.forEach(c => c.classList.remove("active-card"));

            forms[metodo].style.display = "block";
            card.classList.add("active-card");
        });
    });
</script>

</body>
</html>
