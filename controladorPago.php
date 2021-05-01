<?php
include_once('templates/iniciar-html.php');
include_once("Usuarios.php");
include_once("Carrito.php");

$data = $_GET['inputjson'];

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionClientes();

$usuario = new Usuarios();
$modelo = new Carrito();
date_default_timezone_set('America/Bogota');

$toarray = json_decode($data, true);
$idFactura = random_int(100, 999);
foreach ($toarray as $producto) {

    $num = $producto['precio'];
    $value = str_replace( '$', '', $num );
    $valueT= str_replace( '.', '', $value );
    $modelo->add($usuario->getId(), $producto['id'], $producto['titulo'], $valueT, $idFactura, $hoy = date("Y-m-d"));
}

$compras = $modelo->getDataFactura($idFactura);
print_r($compras);

$usuarioFull=$usuario->getById($usuario->getId());
print_r($usuarioFull);
$to_email = $usuarioFull['CORREO'];
echo $to_email;
$subject = "Su compra se ha realizado";
$body = "Hola, has realizado una compra por un valor de ".$compras['COSTO'];
$headers = "From: calf381999@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Done..! Email successfully sent to $to_email .";
    header('Location: https://www.paypal.com/co/signin');
} else {
    echo "Error..! Email Not Sent";
}

echo "<script>localStorage.clear();</script>";

echo "</body></html>";
