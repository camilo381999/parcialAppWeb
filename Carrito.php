<?php
include_once('Conexion.php');
include_once('Usuarios.php');

class Carrito extends Conexion
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

    public function selectParaCsv()
    {
        $statement = $this->db->prepare("SELECT * FROM carrito ORDER BY fecha ASC");
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $r){
            echo $r['ID_CARRITO'] . ",";
            echo $r['USUARIOS_ID_USUARIO'] . ",";
            echo $r['ID_PRODUCTO'] . ",";
            echo $r['PRODUCTO'] . ",";
            echo $r['COSTO'] . ",";
            echo $r['ID_FACTURA'] . ",";
            echo $r['FECHA'] . "\n";
        }
        /*while ($result = $statement->fetchAll()) {
            echo $result->ID_CARRITO . ",";
            echo $result->USUARIOS_ID_USUARIO . ",";
            echo $result->ID_PRODUCTO . ",";
            echo $result->PRODUCTO . ",";
            echo $result->COSTO . ",";
            echo $result->ID_FACTURA . ",";
            echo $result->FECHA . "\n";
        }*/


        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=export.csv;');

    }
}
