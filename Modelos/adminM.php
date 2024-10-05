<?php 

//se solicita asi porque estamos en la misma carpeta
require_once "conexionBD.php";

//la clase AdminM que llamamos en adminC la extenderemos con ConexionBD
class AdminM extends ConexionBD{
	//tendremos una conexion publica estatica porque llevara parametros
	static public function IngresoM($datosC, $tablaBD){
		/*creamos una conexion con la clase y la funcion de la BD y la asignamos a esa variable*/
		//donde sea igual al parametro usuario
		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave FROM $tablaBD WHERE usuario = :usuario");
		/*el prepare prepara una sentencia sql para ser ejecutada por el metodo sql, la sentencia sql puede tener 0 o mas parametros con el nombre name, vamos a ejecutar la sentencia select*/

		/*ahora vamos a enlazar parametros con bindParam, que vincula una variable php a un parametro de sustitucion que corresponde a la sentencia sql y que es usada, preparada para la sentencia*/
		//indicamos que este pdo es un parametro string
		$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		//ejecutamos el pdo
		$pdo->execute();
		//retornamos con fetch porque es una sola fila, si fueran mas seria fetch all
		return $pdo->fetch();
		//Lo cerramos
		$pdo->close();

		
	}


}