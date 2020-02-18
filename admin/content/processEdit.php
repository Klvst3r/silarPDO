<?php

  include '../controller/UserController.php';
  include '../help/helper.php';

?>


<div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Actualización</h4>
              <p class="card-category">Usuarios</p>
            </div>
            <div class="card-body">



<!--   ---------------------- Begins Form Reg ---------------------   -->

<div class="card-body">
  <div class="row">
  <div class="">
    <h4 class="card-title">Actualización de Información</h4>
  </div>
</div>
  <br/>

<!--   ---------------------- Begins Content ---------------------   -->
<?php 

if(isset($_POST["update"])){

   if (isset($_POST['id_user']) and isset($_POST['id_priv']) and isset($_POST['id_status_user']) and isset($_POST['name']) and isset( $_POST['user_name']) and isset($_POST['user_tel']) and isset($_POST['user_email']) and isset($_POST['user_position']) ) {

    
    $id_user          = validate_field($_POST['id_user']);
    $id_priv          = validate_field($_POST['id_priv']);
    $id_status_user   = validate_field($_POST['id_status_user']);
    $name             = validate_field($_POST['name']);
    $user_name        = validate_field($_POST['user_name']);
    $user_tel         = validate_field($_POST['user_tel']);
    $user_email       = validate_field($_POST['user_email']);
    $user_position    = validate_field($_POST['user_position']);


    UserController::updateUser($id_user, $id_priv, $id_status_user, $name, $user_name, $user_tel, $user_email, $user_position);


    echo '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Acción realizada - </b> Se actualizo la información correctamente...
                  </div>';

    echo "<meta HTTP-EQUIV='Refresh' CONTENT='2; URL=index.php'<head/>";

    
  }



   
}else{
  echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Alerta - </b> No se actualizo la información correctamente...
                  </div>';

    echo"<meta HTTP-EQUIV='Refresh' CONTENT='2; URL=op.php?id=11'<head/>";

}

?>

<!--   ---------------------- Ends Content ---------------------   -->

              </div>

<!--   ---------------------- Ends Form Reg ---------------------   -->


            </div>
          </div>
        </div>
      </div>