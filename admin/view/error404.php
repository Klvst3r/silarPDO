<?php
//session_start();

if(isset($_SESSION['user'])){

	require "inc/head.html";
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
	require "content/content404.php";
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