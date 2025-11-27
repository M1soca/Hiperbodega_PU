<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";
require_once __DIR__ . "/../models/Producto.php";

class EscaneoController extends Controller {

    public function index() {

        if (session_status() === PHP_SESSION_NONE) {
        session_start();
        }
        // Crear carrito si no existe
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        $mensaje = "";

        // Cuando escanean
        if(isset($_POST["codigo"])) {

            $codigo = trim($_POST["codigo"]);
            $productoModel = new Producto();
            $producto = $productoModel->buscarPorCodigo($codigo);

            if($producto) {

                // Revisar si ya existe en el carrito
                $encontrado = false;

                for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {

                    if ($_SESSION["carrito"][$i]["codigo"] == $codigo) {
                        $_SESSION["carrito"][$i]["cantidad"]++;
                        $_SESSION["carrito"][$i]["subtotal"] = 
                            $_SESSION["carrito"][$i]["cantidad"] * $producto["precio"];
                        $encontrado = true;
                        break;
                    }
                }

                // Si no estaba → agregarlo
                if (!$encontrado) {
                    $_SESSION["carrito"][] = [
                        "codigo"   => $producto["codigo"],
                        "nombre"   => $producto["nombre"],
                        "precio"   => $producto["precio"],
                        "cantidad" => 1,
                        "subtotal" => $producto["precio"]
                    ];
                }

                $mensaje = "Producto agregado: " . $producto["nombre"];

            } else {
                $mensaje = "Producto NO encontrado";
            }
        }

        View::render("escaneo/escanear", [
            "mensaje" => $mensaje
        ]);
    }
}
