<?php
//tenemos que requerir una sola vez los archivos del controlador del modelo para que todo se conecte con el index
//en la base de datos a las columnas id y cantidad les coloco int y a las de string tipo text
require_once "Controladores/rutasC.php";
require_once "Controladores/usuarioC.php";
require_once "Controladores/productosC.php";

//requerimos el modelos 
require_once "Modelos/rutasM.php";
require_once "Modelos/usuarioM.php";
require_once "Modelos/productosM.php";


$rutas = new RutasControlador(); //instancia de la clase
$rutas->Plantilla(); //funcion de la clase RutasControlador
  