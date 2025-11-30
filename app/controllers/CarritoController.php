<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class CarritoController extends Controller {

    public function index() {

        // Asegurar sesión activa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vaciar carrito si se solicita
        if (isset($_GET["vaciar"])) {
            $_SESSION["carrito"] = [];
        }

        // Inicializar carrito si no existe
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        // Datos enviados a la vista
        View::render("carrito/index", [
            "productos" => $_SESSION["carrito"]
        ]);
    }
}
