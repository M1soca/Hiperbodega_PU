<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class CarritoController extends Controller {

    public function index() {

        if (session_status() === PHP_SESSION_NONE) {
        session_start();
        }

        if (isset($_GET["vaciar"])) {
            unset($_SESSION["carrito"]);
            $_SESSION["carrito"] = [];
            }
        
        if(!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        // Enviar los productos a la vista
        $data = [
            "productos" => $_SESSION["carrito"]
        ];

        View::render("carrito/index", $data);

    }
}