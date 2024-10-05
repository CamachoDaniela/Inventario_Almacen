


  <br>
	<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioI" required>
		<!--el required hace que sea requerido-->
		<input type="password" placeholder="Contraseña" name="claveI" required>
		<!--submit es el boton-->

		<input type="submit" value="Ingresar">

	</form>

	<?php


	$ingreso = new UsuarioC();
	$ingreso->IngresoC();