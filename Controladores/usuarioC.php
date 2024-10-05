<?php


class UsuarioC{

	public function IngresoC(){

		if(isset($_POST["usuarioI"])) {
			$datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);
			//la variable $tablaBD sera igual al nombre de la tabla de la BD
		    $tablaBD = "usuario";

		    //solicitamos una respuesta al modelo

		    $respuesta = UsuarioM::IngresoM($datosC, $tablaBD);
		    //respuesta viene siendo igual a lo que se encuentra en la BD
		   if($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]){
		    	/*Creamos una variable de sesion, sirve para que sea privada y para que solo se pueda ingresar con un usuario y contraseña ya registrada*/

		    	//creamos el metodo session_start
		    	session_start();
		    	//funciona igual que la variable post
		    	//le doy el valor de true a la session
		    	$_SESSION["Ingreso"] = true;
		    	//lo redirijo a registrar
		    	header("location:index.php?ruta=registrar");
			}else{
				echo "Error al ingresar";
			}

		    }
		}
	}

