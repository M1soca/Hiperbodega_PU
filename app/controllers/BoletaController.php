<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class BoletaController extends Controller {

        public function index() {

        session_start();

        // Si no hay carrito, redirecciona
        if (!isset($_SESSION["carrito"])) {
            header("Location: " . BASE_URL);
            exit;
        }

        // Datos del carrito
        $productos = $_SESSION["carrito"];

        // Totales enviados desde PagoController
        $total  = $_SESSION["total_final"] ?? 0;
        $pagado = $_SESSION["pagado"] ?? 0;
        $vuelto = $_SESSION["vuelto"] ?? 0;

        // MÉTODO DE PAGO (este es el que faltaba)
        $metodo = $_SESSION["metodo"] ?? "desconocido";

        // Fecha
        $fecha = date("d/m/Y H:i");

        // Render
        View::render("boleta/index", [
            "productos" => $productos,
            "total"     => $total,
            "pagado"    => $pagado,
            "vuelto"    => $vuelto,
            "metodo"    => $metodo,   // ← ← ← ESTA LÍNEA ERA LA QUE FALTABA
            "fecha"     => $fecha
        ]);
    }

}
