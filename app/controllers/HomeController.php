<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";

class HomeController extends Controller {

    public function index() {
        View::render("home/index");
        if (isset($_GET["nueva_compra"])) {
        session_start();
        unset($_SESSION["carrito"]);
        }
    }
    
}
