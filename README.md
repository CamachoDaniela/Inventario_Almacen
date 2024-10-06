# Inventario para almacén de ropa

El proyecto es una aplicación construida en php puro, 
siguiendo el patrón de diseño MVC (Modelo-vista-controlador)

## Estructura del proyecto

![estructura](https://github.com/user-attachments/assets/f406c84a-518c-495d-a520-77d40a96689c)

## Requisitos
1. Xampp

## Diagrama de clases
![diagrama de clases](https://github.com/user-attachments/assets/31e08f1c-d582-4b62-9214-86ea54641976)

## Código de la aplicación

El archivo `index.php` requiere una sola vez los archivos del controlador de los modelos para que todo quede conectado con el index

```bash
<?php
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
```

El archivo `rutasC.php`: Contiene la clase `RutasControlador` que tiene la función Plantilla en donde se incluye la vista `plantilla. php`
La vista `plantilla.php` tiene la estructura del Html donde en el Head hace el llamado del css `estilos.css` y en el body, por medio de php incluye el modulo `menu.php` y en un section otro código php en donde realiza la instancia de la clase `RutasControlador` del controlador `rutasC.php` y hace uso de la función `Rutas`
el módulo `menu.php` crea la variable get (por medio de un signo de pregunta y luego su nombre, en este caso ruta y con el = se indica hacia vista se quiere redirigir)
la función `Rutas` hace que la variable $rutas sea igual a la información que trae la variable get, hace una conexión con la función `RutasModelo` del modelo `rutasM.php`
pasandole como parámetro la variable $rutas, la respuesta que recibe la guarda en la variable $respuesta y la incluye.

El archivo `conexionBD.php` contiene la clase ConexionBD que tiene la funcion cBD en donde se realiza la conexión con la base de datos 
El archivo `ingreso.php` de las vistas tiene formulario con los campos usuario y clave. Se crea la instancia de la clase `UsuarioC` del controlador `usuarioC.php` y se hace uso de la función `IngresoC` en donde se valida si existe o no el usuario en la base de datos, si existe se crea una sesion privada que permite que solo se pueda ingresar con un usuario y contraseña registrados en la base de datos por medio del metodo session_star() dandole valor de true a la sesión y redirige a registrar

El arhivo `registrar.php` contiene la función session_start() que valida si es true o false el valor de la sesión. Si es falso redirige a la vista ingreso, sino, se muestra el formulario de registrar un producto con los campos Nombre, Cantidad y Género. Se crea la instancia de la clase `ProductosC` del controlador `productosC.php` y se hace uso de la función `RegistrarProductosC` en donde se asigna según corresponde cada uno de los datos a los campos de la tabla productos de la base de datos, hace una conexión con la función `RegistrarProductosM` del modelo `productosM.php` que extiende del modelo `ConexionDB` pasandole como parametro la variable $datosC y $tablaDB, en esta función por medio de prepare solicitamos la sentencia sql e insertamos los valores que recibe como parametros en la base de datos (Enlazando los parametros con bindParam, vinculando la variable php a un parámetro de sustitucóon que corresponde a la sentencia sql y que es preparada para la sentencia. Indicandomos por cado pdo que tipo de parámetro es). la respuesta que recibe la guarda en la variable $respuesta y si se ha hecho correctamente redirige a productos, sino, indica que hay un error.

El archivo `productos.php` contiene la función session_start() que valida si es true o false el valor de la sesión. Si es falso redirige a la vista ingreso, sino, se muestra la tabla `Productos` mostrando los campos Nombre, Cantidad y Genero, además, la opción de editar o eliminar. Se crea la instancia de la clase `ProductosC` del controlador `productosC.php` y se hace uso de la función `MostrarProductosC` en donde se asigna a la variable $tablaDB el nombre de la tabla `productos`, se hace una conexión con la función `MostrarProductosM` del modelo `productosM.php` que extiende del modelo `ConexionDB` pasandole como parámetro la variable $tablaDB, en esta función por medio de  prepare solicitamos la sentencia sql y consultados en la base de datos y se devuelve el resultado de la consulta, se hace el recorrido de cada valor y lo mostramos.

El archivo `editar.php` contiene la función session_start() que valida si es true o false el valor de la sesión. Si es falso redirige a la vista ingreso, sino, se muestra el formulario editar un producto. Se crea la instancia de la clase `ProductosC` del controlador `productosC.php` y se hace uso de la función `EditarProductosC` en donde la variable $datosC sera igual a la variable que traiga la variable get, en donde se asigna a la variable $tablaDB el nombre de la tabla `productos` y se hace una conexión con la función `EditarProductosM` del modelo `productosM.php` que extiende del modelo `ConexionDB` pasandole como parámetro la variable $datosC y $tablaDB. En esta función por medio de prepare solicitamos la sentencia sql y consultamos los valores que recibe como parámetros en la base de datos (Enlazando los parámetros con bindParam, vinculando la variable php a un parámetro de sustitución que corresponde a la sentencia sql y que es preparada para la sentencia. Hacemos un echo con todos los input, solicitamos el input del id el cuál sera oculto (no queremos que lo muestre), abrimos comillas simples y concatenamos lo que venga en la variable respuesta.
La función `ActualizarProductoC` si la variable post viene con informacion en nombreE entonces se edita. la variable $datosC será igual a un array con propiedades (por ejemplo: La propiedad id tendrá de valor la variable post con idE). Se asigna a la variable $tablaDB el nombre de la tabla `productos`, se hace una conexión con la función `ActualizarProductosM` del modelo `productosM.php` que extiende del modelo `ConexionDB` pasandole como parametro la variable $datosC y $tablaDB, en esta función por medio de prepare solicitamos la sentencia sql y actualizamos los valores que recibe como parametros en la base de datos (Enlazando los parametros con bindParam, vinculando la variable php a un parametro de sustitución que corresponde a la sentencia sql y que es preparada para la sentencia.  
La funciòn `BorrarProductosC` si la variable fet contiene información entonces que la variable $datosC sea igual al dato de la variable get. Se asigna a la variable $tablaDB el nombre de la tabla `productos`, se hace una conexión con la función `BorrarProductosM` del modelo `productosM.php` que extiende del modelo `ConexionDB` pasandole como parametro la variable $datosC y $tablaDB, 
en esta función por medio de prepare solicitamos la sentencia sql y eliminamos los valores que recibe como parámetros en la base de datos (Enlazando los parámetros con bindParam, vinculando la variable php a un parametro de sustitucion que corresponde a la sentencia sql y que es preparada para la sentencia. La variable $datosC contiene el id de Get. Valida si se ejecuta.

El archivo `salir.php` empieza con el método session_start manteniendo la sesión y termina con el método session_destroy(); dando fin a la sesión y evitando a partir de esto el uso de cualquier vista no sin antes estar logueado en la aplicación.

## Base de datos
![Phpmyadmin](https://github.com/user-attachments/assets/6fa5ca69-e939-4ab6-8ee5-9dcc397e6b5c)
![usuarios](https://github.com/user-attachments/assets/7685628d-e2f8-46a4-ac5f-22a2c4463c21)
![productos](https://github.com/user-attachments/assets/dc71a266-0467-4e22-9ab0-076fc045e57b)

## Ejecutar aplicación
Descarga el repositorio, ubica la carpeta `mvc` en la carpeta htdocs del XAMPP e importa la base de datos `crud.sql` en phpmyadmin y da start para el módulo de apache y mySQL levantando así el servidor

![carpeta](https://github.com/user-attachments/assets/3d1f3bd3-82e9-4d6d-bb1f-ea8e2ff8040f)

![mvc](https://github.com/user-attachments/assets/dac6fbcc-dc5f-45b7-be78-53d2000d2d08)
