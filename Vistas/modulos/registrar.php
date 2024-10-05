<?php 
//para colocar privadas las sesiones 
session_start();
//si es falso
if(!$_SESSION["Ingreso"]){
	header("location:index.php?ruta=ingreso");
	//saldremos
	exit();
}

 ?>
	<br>
	<h1>REGISTRAR UN PRODUCTO</h1>
	<!--se borra el action-->
	<form method="post">
		
		<input type="text" placeholder="Nombre" name="nombreR" required>

		<input type="text" placeholder="Cantidad" name="cantidadR" required>

		<input type="text" placeholder="Genero" name="generoR" required>

		<input type="submit" value="Registrar">

	</form>


	<?php   

	$registrar = new ProductosC();
	$registrar->RegistrarProductosC();


	 ?>