<?php 

//acá creamos la clase que indicamos en rutasC
//las clases comparten estado, comportamiento e identidad

class Modelo{

//creamos una funcion statica publica porque llevara parametros
	static public function RutasModelo($rutas){

		if($rutas == "ingreso" || $rutas == "registrar" || $rutas == "productos" || $rutas == "editar" || $rutas =="salir")
		{

			$pagina = "Vistas/modulos/".$rutas.".php";
			
		}else if($rutas = "index")
		{

			$pagina = "Vistas/modulos/ingreso.php";			

		}

		return $pagina;

		}

	}









