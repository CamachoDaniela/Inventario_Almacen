<?php 

require_once "conexionBD.php";

class ProductosM extends ConexionBD{

	//Registrar empleados

	static public function RegistrarProductosM($datosC, $tablaBD){

		//con prepare solicitamos la sentencia sql
		//con values insertamos los valores de los parametros


		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre,cantidad,genero) VALUES(:nombre,:cantidad,:genero)");

		/*ahora vamos a enlazar parametros con bindParam, que vincula una variable php a un parametro de sustitucion que corresponde a la sentencia sql y que es usada, preparada para la sentencia indicamos que este pdo es un parametro string*/

		$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_INT);
		$pdo->bindParam(":genero", $datosC["genero"], PDO::PARAM_STR);

		//hacemos que se ejecute la variable pdo, pero con una condicion
		if($pdo->execute()){

			return "Bien";

		}else{

			return "Error";
		}

		$pdo->close();

	}



	//Mostrar empleados
	
	static public function MostrarProductosM($tablaBD){
   //pedimos la sentencia
   	$pdo = ConexionBD::cBD()->prepare("SELECT id,nombre,cantidad,genero FROM $tablaBD");

   	$pdo->execute();

   	//devolvemos una fila o todas las que hayan

   	return $pdo->fetchAll();

    $pdo->close();

	}



	//Editar empleado

	static public function EditarProductoM($datosC, $tablaBD){

		$pdo = conexionBD::cBD()->prepare("SELECT id,nombre,cantidad,genero FROM $tablaBD WHERE id = :id");
		//pasamos el parametro id y la variable $datosc
		//Decimos que este pdo es un parametro entero
		$pdo->bindParam(":id", $datosC, PDO::PARAM_INT);

		$pdo->execute();
		//retornamos con un fetch porque vamos a retornar una sola fila
		return $pdo->fetch();

		$pdo->close();

	}


	//Actualizar empleado
	
	static public function ActualizarProductoM($datosC, $tablaBD){
		//hacemos conexion con la bd y con prepare pasamos la sentencia sql
		//con set colocamos la columna y el parametro
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, cantidad = :cantidad, genero = :genero WHERE id = :id");
		//vinculamos el parametro id en lo que venga $datosC[id]
		$pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_INT);
		$pdo->bindParam(":genero", $datosC["genero"], PDO::PARAM_STR);
		//hacemos que se ejecute la variable pdo, pero con una condicion
		if($pdo->execute()){

			return "Bien";

		}else{

			return "Error";
		}

		$pdo->close();

	}

	//borrar empleado
	
	static public function BorrarProductoM($datosC,$tablaBD){
        //la variable pdo igual a la clase ConexionBD, llamamos la funcion cBD
        //con prepare colocamos la sentencia que utilizaremos
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		//vinculamos los parametros
		//la variable $datosC contiene el id de Get
		$pdo->bindParam(":id", $datosC, PDO::PARAM_INT);

		//Colocamos la misma condicion de crear, editar
		//si pdo se ejecuta retorna bien sino error
		if($pdo->execute()){

			return "Bien";

		}else{

			return "Error";
		}

		$pdo->close();
	}
}


 ?>