<?php
/*
 * After generate Entity create controller
 * Import USERDAO Data Access Object -> PDO to use in defined class by user
*/ 

include '../data/UserDAO.php';
class UserController{

	public static function login($user_name, $user_pass){
		//Inizializamos un objeto para enviar valores (usuario y contraseña)
		$obj_user = new User();

		//*Enviamos el objeto User desde la aplicacion (formulario)
		$obj_user->setUser_name($user_name);
		$obj_user->setUser_pass($user_pass);

		/*La clase nos envia por metodo (login), los parametros al objeto (obj_user) los valores recibidos del
			formulario (user. pass), nos devuelve el resultado de la operacion (true, false)
		*/
		return UserDAO::login($obj_user);
		
	}// login method

	public static function logout(){
		
		return UserDAO::logout();
	}

	public function getUser($user_name, $user_pass){
		$obj_user = new User();

		$obj_user->setUser_name($user_name);
		$obj_user->setUser_pass($user_pass);

		return UserDAO::getUser($obj_user);
	}

	public function changeIn($idUser){
		$obj_user = new User();

		$obj_user->setId_user($idUser);

		return UserDAO::changeIn($obj_user);
	
	}//changeIn

	public function changeOut($iduser){
		$obj_user = new User();

		$obj_user->setId_user($iduser);

		return UserDao::changeOut($obj_user);

	}//changeOut

	//Listar Usuarios
	public function getTableUsers($user){
		$obj_user = new User();

		$obj_user->setId_user($user);

		return UserDAO::getTableUsers($obj_user);
	}

	//Registrar usuario
	public function regUser($id_priv, $id_status_user, $name, $user_name, $user_pass, $user_tel, $user_email, $user_position){
		$obj_user = new User();

		$obj_user->setId_priv($id_priv);
		$obj_user->setId_status_user($id_status_user);
		$obj_user->setName($name);
		$obj_user->setUser_name($user_name);
		$obj_user->setUser_pass($user_pass);
		$obj_user->setUser_tel($user_tel);
		$obj_user->setUser_email($user_email);
		$obj_user->setUser_position($user_position);

		return UserDAO::regUser($obj_user);

	}//regUser method

	//User Listo for edit
	public function getTableUsersEdit($user){
		$obj_user = new User();

		$obj_user->setId_user($user);

		return UserDAO::getTableUsersEdit($obj_user);
	
	}//getTableUsersEdit method

	//Obtain User Data for Edit
	public function getUserData($user){

		$obj_user = new User();

		$obj_user->setId_user($user);

		//echo $obj_user->getId_user();

		return UserDAO::getUserData($obj_user);

	}///getDoc method

	public function updateUser($id_user, $id_priv, $id_status_user, $name, $user_name, $user_tel, $user_email, $user_position){
		$obj_user = new User();

		$obj_user->setId_user($id_user);
		$obj_user->setId_priv($id_priv);
		$obj_user->setId_status_user($id_status_user);
		$obj_user->setName($name);
		$obj_user->setUser_name($user_name);
		$obj_user->setUser_tel($user_tel);
		$obj_user->setUser_email($user_email);
		$obj_user->setUser_position($user_position);

		return UserDAO::updateUser($obj_user);

	}//regUser method

	//User Listo for delete
	public function getTableUsersDel($user){
		$obj_user = new User();

		$obj_user->setId_user($user);

		return UserDAO::getTableUsersDel($obj_user);
	
	}//getTableUsersEdit method
	

}//Class UserController	