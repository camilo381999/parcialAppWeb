<?php
include_once('Conexion.php');
include_once('Usuarios.php');

class Publicacion extends Conexion
{

    function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($idUsuario, $idProducto, $producto, $costo, $idFactura, $fecha)
    {
        $statement = $this->db->prepare("INSERT INTO carrito (USUARIOS_ID_USUARIO,ID_PRODUCTO,PRODUCTO,COSTO,ID_FACTURA,FECHA) VALUES (:idUsuario, :idProducto, :producto, :costo, :idFactura, :fecha)");

        $statement->bindParam(':idUsuario', $idUsuario);
        $statement->bindParam(':idProducto', $idProducto);
        $statement->bindParam(':producto', $producto);
        $statement->bindParam(':costo', $costo);
        $statement->bindParam(':idFactura', $idFactura);
        $statement->bindParam(':fecha', $fecha);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
