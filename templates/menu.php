<?php
include_once('Usuarios.php');
$ControlSesion = new Usuarios();
?>

<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Carrito de compras</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if ($ControlSesion->sesionIniciada()) {
            ?>
                <ul class="navbar-nav mr-auto"></ul>

                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if ($ControlSesion->getPerfil() == 'Usuario') {
                    ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#"><?php echo $ControlSesion->getNombre(); ?></a>
                        </li>

                        <li>
                            <a class="nav-link" href="Usuarios/Salir.php">Cerrar sesión</a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>
            <?php
            } else {
            ?>
                <ul class="navbar-nav mr-auto">
                    <li>

                    </li>
                    <li>

                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-link" href="ingresar.php">Iniciar sesión</a>
                    </li>
                    <li>
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>