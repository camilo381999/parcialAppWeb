<?php
include_once("Usuarios.php");

$ModeloUsuarios = new Usuarios();
//$ModeloUsuarios->validateSessionIndex();

include_once('templates/iniciar-html.php');
include_once('templates/menu.php');
?>

<div class="container-fluid">
    <br><br><br>
    <h2 class="h2-titulos">Nuestros productos</h2>
    <br>

    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12" id="lista-productos">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/iphone.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">iPhone 11 Pro Max</h4>
                            <h5 class="card-title precio">$4.999.900</h5>
                            <p class="card-text descripcion">Triple camara trasera, procesador A13 Bionic, memoria interna de 256/512 GB y batería de 3.900 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="1">Añadir al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/s21plus.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">Samsung Galaxy S21+</h4>
                            <h5 class="card-title precio">$5.149.900</h5>
                            <p class="card-text descripcion">Triple camara trasera, procesador Exynos 2100, memoria interna de 128/256 GB y batería de 4.800 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="2">Añadir al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/note20-ultra.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">Galaxy Note 20 Ultra</h4>
                            <h5 class="card-title precio">$5.499.900</h5>
                            <p class="card-text descripcion">Cuatro camaras traseras, procesador Exynos 990, memoria interna de 256/512 GB y batería de 4.500 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="3">Añadir al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/a51.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">Samsung Galaxy A51</h4>
                            <h5 class="card-title precio">$1.199.900</h5>
                            <p class="card-text descripcion">Cuatro camaras traseras, procesador Exynos 9611, memoria interna de 128 GB y batería de 4.000 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="4">Añadir al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/redmi-note9.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">Xiaomi Redmi Note 9</h4>
                            <h5 class="card-title precio">$999.900</h5>
                            <p class="card-text descripcion">Cuatro camaras traseras, procesador MediaTek Helio G85, memoria interna de 128 Gb y batería de 5.020 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="5">Añadir al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/nokia.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title referencia">Nokia 3.4</h4>
                            <h5 class="card-title precio">$549.900</h5>
                            <p class="card-text descripcion">Triple camara trasera, procesador Qualcomm Snapdragon 460, memoria interna de 64 GB y batería de 4.000 mAh.</p>
                            <a href="" class="btn btn-primary agregar" data-id="6">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-5 col-xs-12">
            <div id="carrito">
                <table id="lista-carrito" class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Producto</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="valor">
                    </tbody>
                </table>

                <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>



            </div>
            <br>
            <form method="GET" action="controladorPago.php">
                <input hidden type='text' id='inputjson' name='inputjson'>
                <script>
                    let producto;
                    if (localStorage.getItem('productos') === null) {
                        producto = [];
                    } else {
                        producto = JSON.parse(localStorage.getItem('productos'));
                    }
                    console.log(producto);
                    document.getElementById('inputjson').value = JSON.stringify(producto);
                </script>

                <?php
                if ($ModeloUsuarios->sesionIniciada()) {
                ?>
                    <button name="procesar-pedido" id="procesar-pedido" type="submit" class="btn btn-danger btn-block">Procesar Compra</button>
                <?php
                } else {
                ?>
                    <a href="ingresar.php" id="procesar-pedido" class="btn btn-danger btn-block">Procesar Compra</a>
                <?php
                }
                ?>
            </form>

            <br>
            <div class="card border-secondary mb-3" id="cardTotal">
                <div class="card-header">Factura</div>
                <div class="card-body text-secondary">
                    <p class="card-text" id="subtotal">Subtotal: </p>
                    <p class="card-text" id="iva">IVA 19%: </p>
                    <h5 class="card-title" id="total">Total a pagar: </h5>
                </div>
            </div>

        </div>

    </div>
    <br>

</div>



<?php
include_once('templates/terminar-html.php');
?>