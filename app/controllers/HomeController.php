<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class HomeController extends Controller {

    public function index() {

        // Si el usuario inicia una nueva compra
        if (isset($_GET["nueva_compra"])) {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Vaciar carrito
            $_SESSION["carrito"] = [];

            // Redirigir a inicio limpio
            header("Location: " . BASE_URL);
            exit;
        }

        // Renderizar la vista del Home
        View::render("home/index");
    }
}
