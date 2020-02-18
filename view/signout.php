<?php
session_start();
include '../controller/UserController.php';

//Se Cambiara el estatus en el campo online = 0 cada vez que se llame a este script
$idUserOnline = $_SESSION["user"]["id_user"];


//echo "ID:" . $idUserOnline;

UserController::changeOut($idUserOnline);

session_destroy();
session_unset();

header("location: ../index.php");

?>