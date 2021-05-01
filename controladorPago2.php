<?php
include_once('templates/iniciar-html.php');
include_once("Usuarios.php");
include_once("Carrito.php");



$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionClientes();

$usuario = new Usuarios();

echo $data;