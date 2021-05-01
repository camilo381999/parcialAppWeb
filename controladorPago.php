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

$toarray=json_decode($data,true);
$idFactura=random_int(100, 999);
foreach($toarray as $producto){
    $modelo->add($usuario->getId(), $producto['id'], $producto['titulo'], $producto['precio'], $idFactura, $hoy = date("Y-m-d"));
}
 
 echo"</body></html>";