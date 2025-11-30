<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class PagoController extends Controller {

    public function index()
{
    session_start();

    if (!isset($_SESSION["carrito"])) {
        header("Location: " . BASE_URL);
        exit;
    }

    $total = 0;
    foreach ($_SESSION["carrito"] as $p) {
        $total += $p["subtotal"];
    }

    // Si viene un POST (confirmar pago)
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $metodo = $_POST["metodo"] ?? null;

        // Validar método
        if (!in_array($metodo, ["yape", "debito", "credito"])) {
            die("Método de pago no válido.");
        }

        // Guardar datos para boleta
        $_SESSION["total_final"] = $total;
        $_SESSION["pagado"] = $total;   // pagado = total (no hay vuelto)
        $_SESSION["vuelto"] = 0;        // no usamos vuelto
        $_SESSION["metodo"] = $metodo;

        header("Location: " . BASE_URL . "boleta");
        exit;
    }

    // Renderizar vista de pago
    View::render("pago/index", [
        "total" => $total
    ]);
    }

}
