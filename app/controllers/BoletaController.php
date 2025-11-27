<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class BoletaController extends Controller {

    public function index() {
        session_start();

        if (!isset($_SESSION["carrito"]) || empty($_SESSION["carrito"])) {
            // Si no hay carrito, redirige al inicio
            header("Location: http://localhost:8080/precio_uno_autoservicio/");
            exit;
        }

        // Tomamos los datos del carrito
        $productos = $_SESSION["carrito"];

        // Tomamos el total enviado desde PagoController
        $total = isset($_SESSION["total_final"]) ? $_SESSION["total_final"] : 0;
        $vuelto = isset($_SESSION["vuelto"]) ? $_SESSION["vuelto"] : 0;
        $pagado = isset($_SESSION["pagado"]) ? $_SESSION["pagado"] : 0;

        View::render("boleta/index", [
            "productos" => $productos,
            "total" => $total,
            "pagado" => $pagado,
            "vuelto" => $vuelto
        ]);
    }
}
