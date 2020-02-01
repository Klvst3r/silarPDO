<?php
include '../controller/UserController.php';
include '../controller/HistoryController.php';


include '../help/helper.php';
session_start();

header('Content-type: application/json');

$result = array();


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["user"]) && isset($_POST["pass"])){

	$code = $_POST["code"];
	$inputUser = validate_field($_POST["user"]);
	$inputPass = validate_field($_POST["pass"]);

	$ip = getenv("REMOTE_ADDR");
		if ($ip = '::1'){
			$ip = '127.0.0.1';
		}

	$timezone  = -7; //(UTC/GMT -7:00) Zona Horaria Estandar (México) - Tiempo del Pacífico: UTC–7 
	$date = date("Y-m-d");
	//hora
	$time_in = date('H:i:s');
	$time_out = '00:00:00';

	if(UserController::login($inputUser,$inputPass)){

		//Reg in Access History
		HistoryController::regHistory($ip, $date, $time_in, $time_out);

		/*After to verify user, pass; reg our access, return elements of login into the system to create
			our session variables
		*/
		$user  = UserController::getUser($inputUser, $inputPass);
		

		//Obtengo el id del ultimo acceso de la tabla History_access
		$idUser = $user->getId_user();

		//echo $idUser;
		$idUserOnline = $user->getId_user();

		//Update in User table the ID of the History of th last access
		$history = HistoryController::updateHistory($idUser);


		//After login, the status of user change to 1 in the field 'online' of user table
		$online = UserController::changeIn($idUserOnline);

		//Create Session variables
				
		$_SESSION["user"] = array (
				"id_user"		=> $user->getId_user(),
				"name"			=> $user->getName(),
				"user"			=> $user->getUser_name(),
				"email"			=> $user->getUser_email(),
				"code"			=> $code,
				"id_priv"		=> $user->getId_Priv(),
				"op"      		=> "false"
							);//$_SESSION

		//  In the definition of session variable    =>       to use variable session 
		//$_SESSION["user"] = array ("id_user" => $user->getId_user())  == $_SESSION["user"]["id_user"];

		$result = array(
			"status" => "true"
			);


		UserController::logout();

		return print(json_encode($result));


	}//UserController::login

  }//isset user and pass
}//if $_SERVER
$result = array("status" => "false");

return print(json_encode($result));
echo '<script>location.href = "../index.php"</script>'; 
header("location:index.html");											