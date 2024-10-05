<?php

class ConexionBD{

	public function cBD(){
	 //se crea una instancia de la clase pdo en el objeto $bd
     //en el primer parametro va el nombre del host, el nombre de la bd
     //en el segundo parametro va el nombre del usuario
     //en el tercer parametro va la contraseña, en este caso no tiene
		$bd = new PDO("mysql:host=localhost;dbname=crud","root","");

		return $bd;

	}

}

/*
host: localhost
nombre_bd: crud
usuario: root
contraseña: */