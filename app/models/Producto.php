<?php
require_once __DIR__ . "/../core/Model.php";

class Producto extends Model {

    public function buscarPorCodigo($codigo) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE codigo = ?");
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
