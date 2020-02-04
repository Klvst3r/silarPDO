<?php
//Importar la BD
include '../inc/Connect.php';
//Inluir modelo del Usuario
include '../model/User.php';


//Conection with la BD
class UserDAO extends Connect {
	//var connection
	protected static $cnx;

	//define connection to the DB
	private static function getConnection(){
		self::$cnx = Connect::dbConnectSimple();

	}

	//Define desconnection to DB
	private static function disconnect(){
		self::$cnx = NULL;	
		
	}

	//Check if exist user who make login
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
				
				
				//close active connection with DB
				self::disconnect();
			}
			return true;

		}
		return false;
		
	}//Login Method

	public static function logout(){
		self::disconnect();
	}//logout method

	public static function getUser($user){

		$query = "SELECT id_user, id_priv, name, user_name, user_pass, user_email FROM users WHERE
		user_name = :user_name and user_pass = :user_pass";

		self::getConnection();

		$result = self::$cnx->prepare($query);

		$user_bd = $user->getUser_name();
		$result->bindParam(":user_name", $user_bd);

		$pass_bd = $user->getUser_pass();
		$result->bindParam(":user_pass", $pass_bd);

		$result->execute();

		$data = $result->fetch();
       

		$user = new User();
		//To send the information to validate and visualize user authentication data
		//carry from the object of the user trought its object instance of the usuers entity
		$user->setId_user($data["id_user"]);
		$user->setId_priv($data["id_priv"]);
		$user->setName($data["name"]);
		$user->setUser_name($data["user_name"]);
		$user->setUser_pass($data["user_pass"]);
		$user->setUser_email($data["user_email"]);

		
		self::disconnect();

		//Return values to user object
		return $user;

	}//getUser method

	public static function changeIn($user){

		$idUser = $user->getId_user();

		$updateIn = "UPDATE `users` SET `online` = '1' WHERE `users`.`id_user` = '$idUser'";

		self::getConnection();

		$result = self::$cnx->prepare($updateIn);

		//$idUser = $user->getId_user();
		//$result->bindParam(":id_user", $idUser);

		if($result->execute()){
			
			self::disconnect();
			
			return true;
		}else{
			return false;
		}

	}//Metodo ChangeIn	

	public static function changeOut($user){

		$idUser = $user->getId_user();

		$updateOut = "UPDATE `users` SET `online` = '0' WHERE `users`.`id_user` = '$idUser'";

		self::getConnection();

		$result = self::$cnx->prepare($updateOut);

		//$idUser = $user->getId_user();
		//$result->bindParam(":id_user", $idUser);

		if($result->execute()){
			
			self::disconnect();
			
			return true;
		}else{
			return false;
		}

	}//Metodo ChangeOut



}//Class UserDAO