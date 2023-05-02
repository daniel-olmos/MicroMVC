
# MicroMVC-PHP

## Estructura de ficheros
```
[D]config
    [F]db.php
    [F]config.php
[D]controller
    [F]note.php
[D]model
    [F]db.php
    [F]note.php
[D]view
    [D]template
        [F]footer.php
        [F]header.php
    [F]confirm_delete_note.php
    [F]delete_note.php
    [F]edit_note.php
    [F]list_note.php
[F]index.php
```
- [D] -> Directorio/Directory
- [F] -> Archivo/File

## config/

guardaremos información básica que atañe tanto a la conexión con base de datos como o tros parámetros. Por ejemplo, el controlador y la acción por defecto.

## controller/
Se encarga de recibir las peticiones desde la vista, solicitar información y/u ordenar cambios al modelo.

## model/
db.php -> Creamos este modelo para facilitar las operaciones contra base de datos.
Tambien puede contener métodos que operan la información en la base de datos.

## view/
En el directorio view tendremos las vistas de nuestra aplicación. 
- view/template/header.php
En esta parte simplementes abriremos las etiquetas necesarias de html, así como incrustaremos las llamadas a las librerías que vamos a utilizar. En nuestro caso, para no tener que trabajar demasiado los estilos, utilizaremos Bootstrap.

Además, mostraremos en el encabezado un título de página, que se cargará de forma dinámica desde nuestro controlador.
- view/template/footer.php
El footer simplemente cerrará las etiquetas body y html, además del div que tiene la clase container y que abrimos en el header.

## public/
Archivos publicos del proyecto

## Features

- Se separan los parametros de base de datos, de los parametros de la aplicación.

