<?php
session_start();

include '../controller/UserController.php';

require "inc/head.html";

if(isset($_SESSION['user'])){

	?>
	<?php
	require "inc/sidebar.html";
	?>
	 
	   <div class="main-panel">
	      <!-- Navbar -->
	<?php
	require "inc/navbar.html";
	?>
	      <!-- End Navbar -->
	<?php
	require "content/maincontent.php";
	?>   
	</div>

	<?php
	//require "inc/footer.html";
	//require "inc/fixed-plugin.html";
	require "inc/core-js.html";

}else{
  echo '<script>location.href = "../index.php"</script>';
}

?>      

</body></html>