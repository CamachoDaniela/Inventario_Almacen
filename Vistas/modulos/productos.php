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
	<h1>Productos</h1>

	<table id="t1" border="1">
		<!--la cabeza de la tabla-->
		<thead>
			<!--la fila de la cabeza de la tabla-->
			<tr>
				<!--las columnas de la cabeza de la tabla-->
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Genero</th>
				<th>Edita</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			<!--lo colocamos en el controlador de empleados-->
			
			<?php

			$mostrar = new ProductosC();
			$mostrar->MostrarProductosC();

			?>

		</tbody>

	</table>

<!--fuera de la tabla creamos un nuevo objeto en php-->

<?php

$eliminar = new ProductosC();
//llama a la nueva funcion que vamos a crear
$eliminar->BorrarProductoC();

?>
