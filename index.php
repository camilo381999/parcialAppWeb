<?php
include_once("Usuarios.php");

$ModeloUsuarios = new Usuarios();
//$ModeloUsuarios->validateSessionIndex();

include_once('templates/iniciar-html.php');
include_once('templates/menu.php');
?>

<div class="container">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2 class="h2-titulos">Nuestros productos</h2>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <img src="img/imgp1.png" width="90%" class="img-info">
            <h3 class="h3-Subtitulos">Producto 1</h3>
            <p class="parrafo-Subtitulos">$20.000</p>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
            <img src="img/imgp2.png" width="90%" class="img-info">
            <h3 class="h3-Subtitulos">Producto 2</h3>
            <p class="parrafo-Subtitulos">$25.000</p>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
            <img src="img/imgp3.png" width="90%" class="img-info">
            <h3 class="h3-Subtitulos">Producto 3</h3>
            <p class="parrafo-Subtitulos">$30.000</p>
        </div>
    </div>

</div>


<?php
include_once('templates/terminar-html.php');
?>