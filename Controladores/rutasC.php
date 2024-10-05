<?php

class RutasControlador{

   public function Plantilla(){

   	include "Vistas/plantilla.php";

   }


   public function Rutas(){
   	/*si la variable get viene con informacion entonces que la variable
   	/ruta sea igual*/
   	if(isset($_GET["ruta"]))
    {
   		$rutas = $_GET["ruta"];

   	}else{

   		$rutas = "index";

    }
    	//hacemos una conexion con una funcion con ::
    	//le pasamos el parametro rutas
    $respuesta = Modelo::RutasModelo($rutas);

    //incluimos con include esta respuesta
    include $respuesta;

   }

}
