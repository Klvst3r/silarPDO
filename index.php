<!doctype html>
<html lang="en">
  <head>
 <?php session_start(); 

include './inc/Connect.php';
$dConnect = new Connect;

$cdb = $dConnect->dbConnectSimple();

  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicons/favicon.ico">

    <title>Signin</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Se incluye la referencia CSS de la libreria overHang.js -->
    <link rel="stylesheet" type="text/css" href="assets/css/overhang.css" /> 

    <!-- Custom styles for login -->
    <link href="assets/css/signin.css" rel="stylesheet">


    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>

    <script type="text/javascript" src="assets/js/overhang.js"></script>

    <script src="assets/js/app.js"></script> 



  </head>
