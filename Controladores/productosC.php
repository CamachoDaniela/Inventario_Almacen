<?php 

class ProductosC{


	//Registrar los productos

	public function RegistrarProductosC(){

		if(isset($_POST["nombreR"])){
			//la propiedad viene siendo la columna de la BD
			//el valor es lo que viene en la variable post

			$datosC = array("nombre"=>$_POST["nombreR"], "cantidad"=>$_POST["cantidadR"],"genero"=>$_POST["generoR"]);
			//la tabla de la BD
			$tablaBD = "productos";

			$respuesta = ProductosM::RegistrarProductosM($datosC, $tablaBD);

			//colocamos condicion
			if($respuesta == "Bien"){

				header("location:index.php?ruta=productos");

			}else{

				echo "error";
			}

		}
	}

	//Mostrar los empleados
	

	public function MostrarProductosC(){

		$tablaBD = "productos";

		$respuesta = ProductosM::MostrarProductosM($tablaBD);

		foreach ($respuesta as $key => $value) {
			//concatenamos por medio de un punto el valor que venga del fetchall
			//dentro del value va el nombre de cada columna de la tabla
			//ruta igual a la pagina editar y unimos el editar con una variable get el id de ese usuario, concatenamos el valor del id
			echo'<tr>
					<td>'.$value["nombre"].'</td>
					<td>'.$value["cantidad"].'</td>
					<td>'.$value["genero"].'</td>


					<td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>

					<td><a href="index.php?ruta=productos&idB='.$value["id"].'"><button>Borrar</button></a></td>
				</tr>';
		}
	}


	public function EditarProductoC(){

			//la variable $datosC sera igual a la variable que traiga la variable get 
		
			$datosC = $_GET["id"];

			$tablaBD = "productos";

			$respuesta = ProductosM::EditarProductoM($datosC, $tablaBD);
			//hacemos un echo con todos los input
			/*solicitamos el input del id el cual sera oculto, no queremos que lo muestre
			entonces en type le colocamos hidden*/
			//abrimos comillas simples y concatenamos lo que venga en la variable respuesta
			echo '<input type="hidden" value="'.$respuesta["id"].'" name="idE">

				<input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombreE" required>

				<input type="number" placeholder="Cantidad" value="'.$respuesta["cantidad"].'" name="cantidadE" required>

				<input type="text" placeholder="Genero" value="'.$respuesta["genero"].'" name="generoE" required>


				<input type="submit" value="Actualizar">';
	}


	//Actualizar producto

	public function ActualizarProductoC(){
		//si la variable post viene con informacion en nombreE entonces se edita
		if(isset($_POST["nombreE"])){
			//la variable $datosC será igual a un array con propiedades
			//por ejemplo la propiedad id tendra de valor la variable post con idE
			$datosC = array("id"=>$_POST["idE"], "nombre"=>$_POST["nombreE"], "cantidad"=>$_POST["cantidadE"],"genero"=>$_POST["generoE"]);
			//variable igual al nombre de la tabla en la bd
			$tablaBD = "productos";
			//le solicitamos una respuesta al modelo
			$respuesta = ProductosM::ActualizarProductoM($datosC, $tablaBD);
			//Creamos una condicion, si se actualiza en la bd nos dirige a productos
			if($respuesta == "Bien"){

				header("location:index.php?ruta=productos");

			}else{

				echo "error";
			}

		}

	}


	//Eliminar producto
	

	public function BorrarProductoC(){
		//si la variable get idB contiene informacion entonces
		if(isset($_GET["idB"])){
			//que la variable $datosC sea igual a la variable get
			$datosC = $_GET["idB"];
			//que la variable $tablaBD sea igual a la tabla producto
			$tablaBD = "productos";
			//con la funcion que vamos a crear en el modelo
			$respuesta = ProductosM::BorrarProductoM($datosC,$tablaBD);

			if($respuesta == "Bien"){

			header("location:index.php?ruta=productos");

			}else{

				echo "error";
			}

		}
	}

}


 ?>