<?php 

require_once 'config/config.php';
require_once 'model/db.php';

if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controller/'.$_GET["controller"].'.php';

/* Check if controller exists */
if(!file_exists($controller_path)) $controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'.php';

/* Load controller */
require_once $controller_path;
$controllerName = $_GET["controller"].'Controller';
$controller = new $controllerName();

/* Check if method is defined */
$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();

/* 05/03/2023 CDO> creo una validacion para usar este archivo con vistas y modales.
Si se desea utilizar para descargas, se debe agregar una condicion mas para archivo tipo _download*/
if (strpos($controller->view, "_view")):
    require_once 'view/template/header.php';
    require_once 'view/'.$controller->view.'.php';
    require_once 'view/template/footer.php';
else:
    require_once 'view/'.$controller->view.'.php';
endif;

?>
