<div class="title">
	<h1>Registro</h1>
</div>

<div class="form-group">
	<input name="Nombre" type="text" class="form-control" placeholder="Nombre" <?php $validar->mostrar_nombre(); ?>>
	<?php
	$validar->mostrar_error_nombre();
	?>
</div>

<div class="form-group">
	<input name="Cedula" type="text" class="form-control" placeholder="Cédula" <?php $validar->mostrar_cedula(); ?>>
	<?php
	$validar->mostrar_error_cedula();
	?>
</div>

<div class="form-group">
	<input name="Correo" type="email" class="form-control" placeholder="Correo" <?php $validar->mostrar_correo(); ?>>
	<?php
	$validar->mostrar_error_correo();
	?>
</div>

<div class="input-group">
	<input name="Contrasena" id="contrasena" type="password" class="form-control" placeholder="Contraseña">
	<img src="img/abierto.png" id="ojo">
	<?php
	$validar->mostrar_error_contrasena();
	?>
</div>
<br>

<button name="registrar" type="submit" class="btn btn-primary btn-block">Registrar</button>