<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar Compra</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/styles.css">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width: 500px;">

    <h2 class="text-center mb-4">Pagar Compra</h2>

    <!-- TARJETA DEL TOTAL -->
    <div class="card p-4 shadow-sm mb-4">

        <h4 class="mb-3">Total a pagar:</h4>
        <h2 class="text-success mb-4">S/ <?= number_format($total, 2) ?></h2>

        <!-- -------------------------
             FORM YAPE / PLIN
        -------------------------- -->
        <div id="form-yape" style="display:none;">
            <h5 class="text-center mb-3">Paga con Yape o Plin</h5>
            <p class="text-center">Escanea este código QR para pagar</p>

            <img src="<?= BASE_URL ?>public/img/qr.png" 
                 class="img-fluid mx-auto d-block"
                 style="max-width:200px;">

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="yape">

                <button class="btn btn-primary w-100 mt-4">
                    Confirmar Pago
                </button>
            </form>

            <a href="<?= BASE_URL ?>carrito" 
               class="btn btn-secondary w-100 mt-3">
               Volver al carrito
            </a>
        </div>


        <!-- -------------------------
             FORM TARJETA DÉBITO
        -------------------------- -->
        <div id="form-debito" style="display:none;">
            <h5 class="text-center mb-3">Tarjeta Débito</h5>

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="debito">

                <input type="text" class="form-control mb-2" placeholder="Número de tarjeta" required>
                <input type="text" class="form-control mb-2" placeholder="MM/AA" required>
                <input type="password" class="form-control mb-3" placeholder="CVV" required>

                <button class="btn btn-primary w-100">Confirmar Pago</button>
            </form>

            <a href="<?= BASE_URL ?>carrito" 
               class="btn btn-secondary w-100 mt-3">
               Volver al carrito
            </a>
        </div>


        <!-- -------------------------
             FORM TARJETA CRÉDITO
        -------------------------- -->
        <div id="form-credito" style="display:none;">
            <h5 class="text-center mb-3">Tarjeta Crédito</h5>

            <form method="POST" action="<?= BASE_URL ?>pago">
                <input type="hidden" name="metodo" value="credito">

                <input type="text" class="form-control mb-2" placeholder="Número de tarjeta" required>
                <input type="text" class="form-control mb-2" placeholder="MM/AA" required>
                <input type="password" class="form-control mb-3" placeholder="CVV" required>

                <button class="btn btn-primary w-100">Confirmar Pago</button>
            </form>

            <a href="<?= BASE_URL ?>carrito" 
               class="btn btn-secondary w-100 mt-3">
               Volver al carrito
            </a>
        </div>

    </div>
</div>

<!-- -------------------------
     SELECTOR DE MÉTODOS
-------------------------- -->

<h4 class="text-center mb-4">Seleccione método de pago</h4>

<div class="d-flex justify-content-center gap-4 mb-5">

    <!-- YAPE / PLIN -->
    <div class="pago-card" data-metodo="yape">
        <img src="<?= BASE_URL ?>public/img/yape.png" alt="Yape" class="pago-icon">
        <p>Yape / Plin</p>
    </div>

    <!-- TARJETA DÉBITO -->
    <div class="pago-card" data-metodo="debito">
        <img src="<?= BASE_URL ?>public/img/debitp.png" alt="Débito" class="pago-icon">
        <p>Tarjeta Débito</p>
    </div>

    <!-- TARJETA CRÉDITO -->
    <div class="pago-card" data-metodo="credito">
        <img src="<?= BASE_URL ?>public/img/credito.png" alt="Crédito" class="pago-icon">
        <p>Tarjeta Crédito</p>
    </div>

</div>


<!-- -------------------------
     SCRIPT (FUNCIONAL)
-------------------------- -->

<script>
    const cards = document.querySelectorAll(".pago-card");

    const formYape = document.getElementById("form-yape");
    const formDebito = document.getElementById("form-debito");
    const formCredito = document.getElementById("form-credito");

    // Ocultamos todo al inicio
    formYape.style.display = "none";
    formDebito.style.display = "none";
    formCredito.style.display = "none";

    // Evento del clic
    cards.forEach(card => {
        card.addEventListener("click", () => {

            const metodo = card.getAttribute("data-metodo");

            // Ocultar todo
            formYape.style.display = "none";
            formDebito.style.display = "none";
            formCredito.style.display = "none";

            // Mostrar según método
            if (metodo === "yape") formYape.style.display = "block";
            if (metodo === "debito") formDebito.style.display = "block";
            if (metodo === "credito") formCredito.style.display = "block";

            // Visual
            cards.forEach(c => c.classList.remove("active-card"));
            card.classList.add("active-card");
        });
    });
</script>

</body>
</html>
