<?php
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../core/View.php";
require_once __DIR__ . "/../models/Producto.php";

class EscaneoController extends Controller {

    public function index() {

        // Iniciar sesión si no existe
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Crear carrito si no existe
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        $mensaje = "";

        // Si se envió un código por POST
        if (isset($_POST["codigo"])) {

            $codigo = trim($_POST["codigo"]);

            // Buscar producto
            $productoModel = new Producto();
            $producto = $productoModel->buscarPorCodigo($codigo);

            if ($producto) {

                // Verificar si ya está en el carrito
                $encontrado = false;

                foreach ($_SESSION["carrito"] as $index => $item) {

                    if ($item["codigo"] == $codigo) {

                        // Incrementar cantidad
                        $_SESSION["carrito"][$index]["cantidad"]++;

                        // Actualizar subtotal
                        $_SESSION["carrito"][$index]["subtotal"] =
                            $_SESSION["carrito"][$index]["cantidad"] * $producto["precio"];

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

                // Truncar nombre para evitar romper diseño
                $nombre = strlen($producto["nombre"]) > 40
                            ? substr($producto["nombre"], 0, 40) . "..."
                            : $producto["nombre"];

                // Mensaje estandarizado estilo retail
                $mensaje = "Añadido al carrito: " . $nombre;

            } else {
                // Mensaje estandarizado de error
                $mensaje = "Código inválido";
            }
        }

        // Renderizar vista
        View::render("escaneo/index", [
            "mensaje" => $mensaje
        ]);
    }
}
