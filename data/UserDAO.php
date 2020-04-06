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

	public static function getTableUsers($action){
		$query = "SELECT A.id_user as ID, A.name AS Nombre, A.user_name, B.privelege, C.desc_status_user,  
				 A.user_tel AS Telefono, A.user_email AS Email, A.user_position AS Puesto 
				FROM users A, priveleges B, status_user C 
				WHERE A.id_priv = B.id_priv AND A.id_status_user = C.id_status_user ORDER BY ID ASC;";

		self::getConnection();

		

		$result = self::$cnx->prepare($query);

		$result->execute();

		
		$rows = $result->rowCount();
		$cols = $result->columnCount();
		

		if($result->rowCount() > 0){

		?>
		<div class="table-responsive">
		<table class="table table-striped"> 
		<thead>   

		        <!-- <tr>
		            <th>ID</th>
		            <th>NAME</th>
		            <th>USERNAME</th>
		            <th style="text-align:center;">ACCIONES</th>
		        </tr>            -->
<!------------------------   Table Head Begins ------------------------->
		       <?php
		       echo '  
		       <tr>';

			foreach(range(0, $result->columnCount() - 6) as $column_index){
				$meta[] = $result->getColumnMeta($column_index);
			}

			for ($i=0; $i < $cols - 6; $i++){
				echo '<th style="text-align:center;">' . $meta[$i]["name"] . '</td>';	
			}       		
			echo '<th style="text-align:center;">Acción</th>';

			echo '</tr>

		       ';


		       ?>
<!------------------------   Table Head Ends ------------------------->		       
		<thead>   
		<tbody>  
			<form role="form" name="formUser" method="post" action="index.php"> 
		<?php
		echo '<br />';
        for($filas = 0; $filas < $rows; $filas++){
        	$data = $result->fetch();
            ?>
            <tr>
                <td style="text-align:center;"><?php echo $data['ID']; ?></td>
                <td style="text-align:center;"><?php echo $data['Nombre']; ?></td>

                <!-- <td>Boton Ver</td> -->
				<td style="text-align:center;">
                <button id="see-user" name="see-user" type="button" class="btn btn-primary btn-sm"
        				data-toggle="modal"
        				data-target="#myModal"
        				onclick="openUser('see', 
                    '<?php echo $data['ID']; ?>', 
                    '<?php echo $data['Nombre']; ?>',
                    '<?php echo $data['user_name']; ?>',
                    '<?php echo $data['privelege']; ?>',
                    '<?php echo $data['desc_status_user']; ?>',
                    '<?php echo $data['Telefono']; ?>',
                    '<?php echo $data['Email']; ?>',
                    '<?php echo $data['Puesto']; ?>'
                    )">
    			Ver</button>
				</td>

            </tr>    
		<?php
        	}
        ?>
       </form>        
</tbody>      
</table>


</div>         

<?php		
    

return true;

		}else{

			echo 'Tabla vacia: ' . $exception;
			return false;
		}


 }//getTableUsers method


	public static function regUser($user){

		/*echo $user->getId_priv();
		echo "</br>";
		echo $user->getId_status_user();
		echo "</br>";
		echo $user->getName();
		echo "</br>";
		echo $user->getUser_name();
		echo "</br>";
		echo $user->getUser_pass();
		echo "</br>";
		echo $user->getUser_tel();
		echo "</br>";
		echo $user->getUser_email();
		echo "</br>";
		echo $user->getUser_position();*/


		/*$id_priv 			= $user->getId_priv();	
		$id_status_user 	= $user->getId_status_user();
		$id_history			= 0;
		$name 				= $user->getName();	
		$user_name 			= $user->getUser_name();	
		$user_pass 			= $user->getUser_pass();	
		$user_tel 			= $user->getUser_tel();	
		$user_email 		= $user->getUser_email();	
		$user_position 		= $user->getUser_position();
		$online				= 0;*/


		/*$query = "INSERT INTO `users` (`id_user`, `id_priv`, `id_status_user`, `id_history`, `name`, `user_name`, `user_pass`, `user_tel`, `user_email`, `user_position`, `online`) VALUES (NULL, '$id_priv', '$id_status_user', '$id_history', '$name', '$user_name', '$user_pass', '$user_tel', '$user_email', '$user_position', '$online');";*/


		$query = "INSERT INTO `users` (`id_user`, `id_priv`, `id_status_user`, `id_history`, `name`, `user_name`, `user_pass`, `user_tel`, `user_email`, `user_position`, `online`) 
		VALUES (NULL, :id_priv, :id_status_user, :id_history, :name, :user_name, :user_pass, :user_tel, :user_email, :user_position, :online);";



		self::getConnection();

		$result = self::$cnx->prepare($query);


		$id_priv 			= $user->getId_priv();	
		$result->bindParam(":id_priv", $id_priv);

		$id_status_user 	= $user->getId_status_user();
		$result->bindParam(":id_status_user", $id_status_user);

		$id_history			= 0;
		$result->bindParam(":id_history", $id_history);

		$name 				= $user->getName();	
		$result->bindParam(":name", $name);

		$user_name 			= $user->getUser_name();	
		$result->bindParam(":user_name", $user_name);

		$user_pass 			= $user->getUser_pass();	
		$result->bindParam(":user_pass", $user_pass);

		$user_tel 			= $user->getUser_tel();	
		$result->bindParam(":user_tel", $user_tel);

		$user_email 		= $user->getUser_email();	
		$result->bindParam(":user_email", $user_email);

		$user_position 		= $user->getUser_position();
		$result->bindParam(":user_position", $user_position);

		$online 			= '0';
		$result->bindParam(":online", $online);

		
		if($result->execute()){

			echo '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Listo - </b> Se registro la información correctamente...
                  </div>';

    
    		echo"<meta HTTP-EQUIV='Refresh' CONTENT='2; URL=index.php'<head/>";

			
			self::disconnect();
			
			return true;
		}else{
			return false;
		}


 } //regUser method 


	public static function getTableUsersEdit($action){

	/*$query = "SELECT id_user AS ID, name as Nombre, user_name as Usuario, id_priv, id_status_user FROM users;";*/
	$query = "SELECT A.id_user AS ID, A.name as Nombre, A.user_name as Usuario, B.privelege, C.desc_status_user, A.user_tel AS Telefono, A.user_email AS Email, A.user_position AS Puesto 
		FROM users A, priveleges B, status_user C 
		WHERE A.id_priv = B.id_priv AND A.id_status_user = C.id_status_user ORDER BY ID ASC;";

	self::getConnection();

	$result = self::$cnx->prepare($query);

	$result->execute();

	$rows = $result->rowCount();
	$cols = $result->columnCount();

	if($result->rowCount() > 0){

	?>
	<div class="table-responsive">
	<table class="table table-striped"> 
	<thead>   

<!------------------------   Table Head Begins ------------------------->
<?php
	echo '  
	<tr>';

	foreach(range(0, $result->columnCount() - 2) as $column_index){
		$meta[] = $result->getColumnMeta($column_index);
	}

	for ($i=0; $i < $cols - 6; $i++){
		echo '<th style="text-align:center;">' . $meta[$i]["name"] . '</td>';	
	}       		
		echo '<th style="text-align:center;">Acción</th>';

	echo '</tr>

	';

?>
<!------------------------   Table Head Ends ------------------------->		       
	<thead>   
	<tbody>  
		<form role="form" name="formUser" method="post" action="index.php"> 
	<?php
	echo '<br />';
    for($filas = 0; $filas < $rows; $filas++){
    	$data = $result->fetch();
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $data['ID']; ?></td>
            <td style="text-align:center;"><?php echo $data['Nombre']; ?></td>
            
            <!-- <td>Boton Editar</td> -->
		<?php

		$edit = '<a class="btn btn-warning btn-sm" href="op.php?id=12&u='. $data['ID'] .'">Editar</a>';

		?>
			<td style="text-align:center;">

		<?php

		echo $edit;

		?>

			</td>

        </tr>    
	<?php
    	}
    ?>
   </form>        
</tbody>      
</table>


</div>         

<?php		

return true;

	}else{

		echo 'Tabla vacia: ' . $exception;
		return false;
	}


}//getTableUsersEdit method

public function getUserData($user){

	/*$id_user = $user->getId_user();
	echo "ID: " . $id_user;
		echo "</br>";*/

	$query = "SELECT A.id_priv, B.privelege, A.id_status_user, C.desc_status_user, A.name, A.user_name, A.user_tel, A.user_email, A.user_position 
	FROM users A, priveleges B, status_user C 
	WHERE A.id_priv = B.id_priv AND A.id_status_user = C.id_status_user AND A.id_user = :id_user";
	
	self::getConnection();

	$result = self::$cnx->prepare($query);

	$id_user 			= $user->getId_user();	
	$result->bindParam(":id_user", $id_user);

	//Execution
	$result->execute();

	$data = $result->fetch();

	$user = new User();
	//We send the information through its properties
	//In this way we will already have loaded in the new object in the instance of the entity
	$user->setId_priv($data["id_priv"]);
	$user->setPrivelege($data["privelege"]);
	$user->setId_status_user($data["id_status_user"]);
	$user->setDesc_status_user($data["desc_status_user"]);
	$user->setName($data["name"]);
	$user->setUser_name($data["user_name"]);
	$user->setUser_tel($data["user_tel"]);
	$user->setUser_email($data["user_email"]);
	$user->setUser_position($data["user_position"]);


	self::disconnect();

	
	//Return the entity
	return $user;

	}///getDoc method

	public static function updateUser($user){

		$update = "UPDATE `users` SET `id_priv` = :id_priv, `id_status_user` = :id_status_user, `name` = :name, `user_name` = :user_name, `user_tel` = :user_tel, `user_email` = :user_email, `user_position` = :user_position WHERE `users`.`id_user` = :id_user;";

		self::getConnection();

		$result = self::$cnx->prepare($update);

		$id_user 			= $user->getId_user();	
		$result->bindParam(":id_user", $id_user);

		$id_priv 			= $user->getId_priv();
		$result->bindParam(":id_priv", $id_priv);

		$id_status_user 	= $user->getId_status_user();
		$result->bindParam(":id_status_user", $id_status_user);

		$name 				= $user->getName();
		$result->bindParam(":name", $name);

		$user_name 			= $user->getUser_name();
		$result->bindParam(":user_name", $user_name);

		$user_tel 			= $user->getUser_tel();
		$result->bindParam(":user_tel", $user_tel);

		$user_email 	 	= $user->getUser_email();
		$result->bindParam(":user_email", $user_email);
		
		$user_position 		= $user->getUser_position();
		$result->bindParam(":user_position", $user_position);

		if($result->execute()){
			//return true;
			//echo "Insercion Exitosa";
			self::disconnect();
			return true;
		}

		return false;
	
	}//updateUser method

	public static function getTableUsersDel($action){

	/*$query = "SELECT id_user AS ID, name as Nombre, user_name as Usuario, id_priv, id_status_user FROM users;";*/
	$query = "SELECT A.id_user AS ID, A.name as Nombre, A.user_name as Usuario, B.privelege, C.desc_status_user, A.user_tel AS Telefono, A.user_email AS Email, A.user_position AS Puesto 
		FROM users A, priveleges B, status_user C 
		WHERE A.id_priv = B.id_priv AND A.id_status_user = C.id_status_user ORDER BY ID ASC;";

	self::getConnection();

	$result = self::$cnx->prepare($query);

	$result->execute();

	$rows = $result->rowCount();
	$cols = $result->columnCount();

	if($result->rowCount() > 0){

	?>
	<div class="table-responsive">
	<table class="table table-striped"> 
	<thead>   

<!------------------------   Table Head Begins ------------------------->
<?php
	echo '  
	<tr>';

	foreach(range(0, $result->columnCount() - 2) as $column_index){
		$meta[] = $result->getColumnMeta($column_index);
	}

	for ($i=0; $i < $cols - 6; $i++){
		echo '<th style="text-align:center;">' . $meta[$i]["name"] . '</td>';	
	}       		
		echo '<th style="text-align:center;">Acción</th>';

	echo '</tr>

	';

?>
<!------------------------   Table Head Ends ------------------------->		       
	<thead>   
	<tbody>  
		<form role="form" name="formUser" method="post" action="index.php"> 
	<?php
	echo '<br />';
    for($filas = 0; $filas < $rows; $filas++){
    	$data = $result->fetch();

    	$id = $data['ID'];
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $data['ID']; ?></td>
            <td style="text-align:center;"><?php echo $data['Nombre']; ?></td>
            
            <!-- <td>Boton Editar</td> -->
		<?php

		//$delete = '<a class="btn btn-danger btn-sm" href="op.php?id=22&u='. $data['ID'] .'">Eliminar</a>';
		//$delete = '<button class="btn btn-danger btn-sm" onclick="confirmar(\'op.php?id=22&u='. $data['ID'] .'\')">Eliminar</button>';
		$delete = '<button class="btn btn-danger btn-sm" onclick="confirmar(\'action.php?a=21&b=' . $id . '\')">Eliminar</button>';

		?>
			<td style="text-align:center;">

		<?php

		echo $delete;

		?>

			</td>

        </tr>    
	<?php
    	}
    ?>
   </form>        
</tbody>      
</table>


</div>         

<?php		

return true;

	}else{

		echo 'Tabla vacia: ' . $exception;
		return false;
	}


}//getTableUsers method



}//Class UserDAO