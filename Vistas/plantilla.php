<!DOCTYPE html>
<html lang="es">
<!--al que al principio era index.html lo convierto en plantilla.php, ingreso.php y menu.php-->
<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
</head>

<body>

<?php

	include "modulos/menu.php";

 
?>

<section>
    
    <?php 

      $rutas = new RutasControlador(); //instancia de la clase del controlador rutasC
      $rutas->Rutas(); //funcion del controlador rutasC

     ?>

</section>
	
</body>

</html>