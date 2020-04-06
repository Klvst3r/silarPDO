<?php
session_start();

//$_SESSION["user"]["code"] = "true";

$id = $_GET['id'];
/**
 * Dentro de cada opcion debera cargarse las variables de session para quedar dentro del sistema,
 * este valor sera integrado despues de cargar el menu
  */
if(isset($id)){
	switch($id){
		case 1:
			//Listar usuarios
			//require_once("view/listUser.php");
			break;
		case 2:
			//Registrar Usuarios
			require_once("view/formRegUser.php");
			break;
		case 3:
			//Capturar valores del form
			require_once("view/regUser.php");
			break;
		case 11:
			//Modificar Usuarios
			require_once("view/listEditUser.php");
			break;
		case 12:
			//Formuarrio de Usuario a Modificar
			require_once("view/formEditUser.php");
			break;
		case 13:
			//Formuarrio de Usuario a Modificar
			require_once("view/editUser.php");
			break;
		case 21:
			//Listar Usuiarios a eliminar
			require_once("view/listDelUser.php");
			break;
		case 22:
			//Formulario para Eliminar Usuiarios
			require_once("view/delUser.php");
			break;
		case 31:
			//Cambiar Pass
			require_once("view/changePass.php");
			break;
		
		
		default:
			require_once("view/error404.php");
			/*echo"No hay mas Opciones";
			echo "<br/>";
			echo"<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=../index.php'<head/>";*/
			break;

	}
}

?>