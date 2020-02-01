<?php
//Importar la BD
include '../inc/Connect.php';
//Inluir modelo del Usuario
include '../model/User.php';


//Establecer conexion con la BD
class UserDAO extends Connect {
	//Definimos la variable de conexion
	protected static $cnx;

	//Definir la conexion a la BD
	private static function getConnection(){
		self::$cnx = Connect::dbConnectSimple();

	}

	//Definir la desconexion a la BD
	private static function disconnect(){
		self::$cnx = NULL;	
		
	}

}//Class UserDAO