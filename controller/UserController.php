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
		
	}

}//Class UserController	