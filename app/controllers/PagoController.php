<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class PagoController extends Controller {

    public function index() {
        session_start();

        if (!isset($_SESSION["carrito"])) {
            header("Location: /precio_uno_autoservicio/");
            exit;
        }

        // Calcular total
        $total = 0;
        foreach ($_SESSION["carrito"] as $p) {
            $total += $p["subtotal"];
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pagado = floatval($_POST["monto"]);
            $vuelto = $pagado - $total;

            $_SESSION["total_final"] = $total;
            $_SESSION["pagado"] = $pagado;
            $_SESSION["vuelto"] = $vuelto;

            header("Location: http://localhost:8080/precio_uno_autoservicio/boleta");
            exit;
        }

        View::render("pago/index", [
            "total" => $total
        ]);
    }
}
