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
        $query = $this->db->query("SELECT * FROM carrito ORDER BY fecha ASC");

        if ($query->rowCount() > 0) {
            $delimiter =';';

            $f = fopen('exportar.csv', 'w'); 

            $fields = array('ID_CARRITO', 'USUARIOS_ID_USUARIO', 'ID_PRODUCTO', 'PRODUCTO',
             'COSTO', 'ID_FACTURA','FECHA');
            fputcsv($f, $fields,$delimiter);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $lineData = array($row['ID_CARRITO'], $row['USUARIOS_ID_USUARIO'],
                 $row['ID_PRODUCTO'], $row['PRODUCTO'], $row['COSTO'], $row['ID_FACTURA'],
                  $row['FECHA']);
                fputcsv($f, $lineData,$delimiter);
            }

            fseek($f, 0);

            //header('Content-Type: application/csv; charset=utf-8');
            //header('Content-Disposition: attachment; filename= exportar.csv;');

            
        }
    }
}
