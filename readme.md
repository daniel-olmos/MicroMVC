
# MicroMVC-PHP
MVC es un patrón de arquitectura de software, que aporta cierto orden y escalabilidad en los desarrollos. En un primer momento puede resultar intimidante o complejo, pero si lo analizamos con calma, comprobaremos que tal dificultad no es real.

Como programadores deberemos conocer este paradigma y la forma correcta de aplicarlo. A continuación veremos una pequeña explicación y un ejemplo muy simple en PHP.

## ¿Qué es MVC?
MVC significa modelo (model) vista (view) controlador (controller). Esto es lo que significan cada uno de esos componentes.

## Definiciones
**Modelo:** se encarga de, por ejemplo, cargar datos y realizar operaciones en ellos.
**Vista:** el frontend o interfaz gráfica de usuario (GUI), es la capa que vé el usuario.
**Controlador:** se encarga de solicitar datos al modelo y enviarlos a la vista. Interconecta el frontend con el backend.

## ¿Qué nos permite MVC?
Entre las ventajas que nos aporta el modelo vista controlador podremos destacar: escalabilidad, orden de código y generar sistemas modulares.

## ¿Por qué deberías usar MVC?
MVC está ampliamente implantado y aceptado en el desarrollo de software desde hace muchísimos años.

Te ayuda a dividir el código frontend y e backend, permitiendo así realizar cambios en las aplicaciones a varios equipos, por ejemplo programadores PHP y diseñadores de interfaces web.



# Documentación del repositorio
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

## public/ <sub>_opcional_</sub> 
Archivos publicos del proyecto

## Features

- Se separan los parametros de base de datos, de los parametros de la aplicación.
- Se crea logica para trabajar con vistas, modales, y descargas desde un mismo archivo


