<?php
include_once('templates/iniciar-html.php');
include_once("Usuarios.php");
include_once("Carrito.php");

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionClientes();

$usuario = new Usuarios();
echo "
 <script>
    document.body.innerHTML = `<input type='text' >`;
    
    let producto;
    if (localStorage.getItem('productos') === null) {
        producto = [];
    } else {
        producto = JSON.parse(localStorage.getItem('productos'));
    }
    console.log(producto);
 </script>";
 
 echo"</body></html>";