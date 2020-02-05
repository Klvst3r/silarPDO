<!DOCTYPE html>
<html lang="en">
  <head>
    <?php session_start(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Login PDO</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Se incluye la referencia CSS de la libreria overHang.js -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/overhang.min.css" />  -->
  </head>

  <body>

<?php
if(isset($_SESSION['user'])){




?>
<div class="container">

	<div class="starter-template">
		<br/>
		<br/>
		<br/>
		<div class="jumbotron">
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["user"]["name"]; ?></h1>
				<?php 



					echo $_SESSION["user"]["id_priv"]==1?'Admin':'Registro'; 
					

					/*echo "<br/>";

					echo $_SESSION["user"]["id_priv"];*/

			//if($code == "true" and $_SESSION["user"]["code"] == "true"){
				if($_SESSION["user"]["id_priv"]==1){


					?>
					<p>Panel de Control | <span class="label label-info">Redirigiendo al menu de administrador...</span></p>
					<?php
					//echo"<meta HTTP-EQUIV='Refresh' CONTENT='2; URL=administrador.php'<head/>";
					echo "SESSION_id: " . $_SESSION["user"]["id_priv"]; //Admin -> $id_priv ="1"
					header("location:../admin/"); 
					

				}/*if($_SESSION["user"]["id_priv"] > 1 && $_SESSION["user"]["id_priv"] < 9 ){
					?>
					<p>Panel de Control | <span class="label label-info">Redirigiendo a otro menu...</span></p>
					<?php
					//echo"<meta HTTP-EQUIV='Refresh' CONTENT='2; URL=administrador.php'<head/>";
					//header("location:../user/"); 
					//$_SESSION["user"]["code"] = "false";

				}*/else{
					//header("location:usuario.php"); 
					?>
					<p>Panel de Control | <span class="label label-info">Redirigiendo a un menu desconocido...</span></p>
					<?php

					echo "SESSION_id: " . $_SESSION["user"]["id_priv"];
					//echo"<meta HTTP-EQUIV='Refresh' CONTENT='4; URL=../dev/'<head/>";
					header("location:../dev/"); //Dev -> $id_priv ="2"
				}

				?>
				<?php
                 //header('Location: menuPrip.php');
                ?>

				<!--<p>
					<a href="signout.php" class="btn btn-primary btn-lg">Cerrar Sesión</a>
				</p> -->
			</div>
		</div>
	</div>

</div><!-- /.container -->  
<?php
}else{
  //echo '<script>location.href = "../index.php"</script>';
}

?>
  </body>
</html>
 	