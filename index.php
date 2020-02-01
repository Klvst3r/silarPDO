<!doctype html>
<html lang="en">
  <head>
 <?php session_start(); 

/*include './inc/Connect.php';
$dConnect = new Connect;

$cdb = $dConnect->dbConnectSimple();*/

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
<body class="text-center">
  
    <?php
    /*
    Cada que el usuario llega a index, se destruyen las variables de sesion, 
    Desconecta la base de datos si es que existiera una conexion
    Las variables de sesion se vacian
    Y se crea una bandera de codigo = false, es decir que la variable code del formulario de login
    toma el valor de valso, indicando que no sea enviado ningun valor desde el login desde index.php
     */
    $code = $_POST["code"]="false";
    //Disconnect::disconn();
    session_destroy();
    session_unset();
    ?>
    <form class="form-signin" id="loginForm" action="inc/validaCode.php" method="POST" role="form">
      <img class="mb-4" src="assets/img/favicons/favicon.ico" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Ingrese sus credenciales</h1>
      
      <input type="hidden" name="code" value="true">
      
      <label for="user" class="sr-only">Usuario</label>
      <input type="text" id="user" class="form-control" placeholder="Nombre de usuario" name="user" required autofocus>
      <label for="pass" class="sr-only">Password</label>
      <input type="password" id="pass" name ="pass" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
 
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y') ?></p>
    </form>



  </body>
</html>
