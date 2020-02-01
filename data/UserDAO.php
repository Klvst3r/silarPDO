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

	public static function login($user){

		$query = "SELECT id_user, id_priv, name, user_name, user_pass, user_email, id_status_user, user_position, online FROM users WHERE user_name = :user_name AND user_pass = :user_pass";
		
		self::getConnection();

		$result = self::$cnx->prepare($query);

		$user_bd  = $user->getUser_name();
		$result->bindParam(":user_name",$user_bd);

		$pass_bd = $user->getUser_pass();
		$result->bindParam(":user_pass",$pass_bd);

		$result->execute();

		if($result->rowCount() > 0){

			$data = $result->fetch();

			if($data['user_name'] == $user->getUser_name() && $data['user_pass'] == $user->getUser_pass()){

				if($data['id_status_user'] <> 1){
					$status = true;
					return false;
				}
				
				$login = true;
				return $login;
				
				
				//cerramos la conexion activa con la BD
				self::disconnect();
			}
			return true;

		}
		return false;
		
	}//Login Method

}//Class UserDAO