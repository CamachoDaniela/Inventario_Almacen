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
	<h1>EDITAR UN PRODUCTO</h1>
	<!--se borra el action-->
	<form method="post">
		
		

		<?php   
		//se hae la instancia de la clase a una variable que actua como objeto, el objeto es una entidad con metodos y mensajes a los cuales responde propiedades con valores concretos
		$editar = new ProductosC();
		$editar->EditarProductoC();

		//creamos un nuevo objeto
		$actualizar = new ProductosC();
		//el objeto llama a la clase
		$actualizar->ActualizarProductoC();

	    ?>

	</form>


	