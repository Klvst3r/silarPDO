


<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Listado</h4>
        <p class="card-category">Usuarios</p>
      </div>
<div class="card-body">



<!--   ---------------------- Begins Form Reg ---------------------   -->

<?php
include '../data/Form.php';
include '../sql/Combo.php';

?>

<div class="card-body">
	<div class="row">
	<div class="">
		<h4 class="card-title">Formulario</h4>
	</div>
</div>
	<br/>

<!--   	<form name="regContent_submit" method="POST" action="action.php?id=3" accept-charset="utf-8"> -->
<?php

$form = new Form('regContent_submit','POST','op.php?id=3','utf-8');

?>
  
<div class="row">
  <div class="col-md-6">
    
    <div class="alert alert-primary">

<?php
    /*---   Privilegio ---*/         
     $query = "SELECT id_priv, privelege from priveleges order by id_priv";
     $combo = new combo($query,"id_priv","id_priv", "", "Privilegio","required","","","1");

     /*---   Estatus ---*/         
     $query = "SELECT id_status_user, desc_status_user from status_user order by id_status_user";
     $combo = new combo($query,"id_status_user","id_status_user", "", "Estado","required","","","1");

     /*---   Nombre ---*/         
     $form -> addField(1, array(
      "field_name"    =>  "name",
      "class_label"   =>  "",
      "label_field"   =>  "Nombre",
      "div_field"     =>  "",
      "input_class"   =>  "col-md-12",
      "readonly"      =>  "",
      "disabled"      =>  "",
      "value"         =>  "",
      "maxlength"     =>  "",
      "size"          =>  "",
      "style"         =>  "",
      "js"            =>  "",
      "placeholder"   =>  "Escriba su Nombre",
      "required"      =>  "required",
      "autofocus"     =>  ""
      ));

     /*---   Usuario ---*/
     $form -> addField(1, array(
      "field_name"    =>  "user_name",
      "class_label"   =>  "",
      "label_field"   =>  "Usuario",
      "div_field"     =>  "",
      "input_class"   =>  "col-md-12",
      "readonly"      =>  "",
      "disabled"      =>  "",
      "value"         =>  "",
      "maxlength"     =>  "",
      "size"          =>  "",
      "style"         =>  "",
      "js"            =>  "",
      "placeholder"   =>  "Nombre de Usuario",
      "required"      =>  "required",
      "autofocus"     =>  "autofocus"
      ));
              
?>

    </div>
            
  </div>
          
  <div class="col-md-6">
            
    <div class="alert alert-primary">
<?php
    /*---   Password ---*/
    $form -> addField(2, array(
        "field_name"    =>  "user_pass",
        "class_label"   =>  "",
        "label_field"   =>  "Password",
        "div_field"     =>  "",
        "input_class"   =>  "col-md-12",
        "readonly"      =>  "",
        "disabled"      =>  "",
        "value"         =>  "",
        "maxlength"     =>  "",
        "size"          =>  "",
        "style"         =>  "",
        "js"            =>  "",
        "placeholder"   =>  "**********",
        "required"      =>  "required",
        "autofocus"     =>  "autofocus"
        ));

    /*---   Telefono ---*/
    $form -> addField(7, array(
    "field_name"    =>  "user_tel",
    "label_field"   =>  "Telefono",
    "class_label"   =>  "",
    "div_field"     =>  "",
    "input_class"   =>  "col-md-12",
    "readonly"      =>  "",
    "disabled"      =>  "",
    "value"         =>  "",
    "maxlength"     =>  "10",
    "size"          =>  "10",
    "style"         =>  "",
    "js"            =>  "",
    "placeholder"   =>  "Numero telefónico...",
    "required"      =>  "required",
    "autofocus"     =>  "autofocus"
    ));

    /*---   Email ---*/
    $form -> addField(8, array(
      "field_name"    =>  "user_email",
      "label_field"   =>  "Correo Electrónico",
      "class_label"   =>  "",
      "div_field"     =>  "",
      "input_class"   =>  "col-md-12",
      "readonly"      =>  "",
      "disabled"      =>  "",
      "value"         =>  "",
      "maxlength"     =>  "",
      "size"          =>  "",
      "style"         =>  "",
      "js"            =>  "",
      "placeholder"   =>  "Escriba su email...",
      "required"      =>  "required",
      "autofocus"     =>  "autofocus"
      ));

      /*---   Puesto ---*/         
     $form -> addField(1, array(
      "field_name"    =>  "user_position",
      "class_label"   =>  "",
      "label_field"   =>  "Puesto",
      "div_field"     =>  "",
      "input_class"   =>  "col-md-12",
      "readonly"      =>  "",
      "disabled"      =>  "",
      "value"         =>  "",
      "maxlength"     =>  "",
      "size"          =>  "",
      "style"         =>  "",
      "js"            =>  "",
      "placeholder"   =>  "Puesto del usuario",
      "required"      =>  "required",
      "autofocus"     =>  ""
      ));


?>      
              
     </div>

   </div>

</div>

<div class="alert alert-primary">
<center>
              
<?php

    $form -> addField(3, array(
      "name"           =>  "save",
      "type_button"    =>  "btn btn-primary",
      "tooltip"        =>  "Registrar",
      "icon"           =>  "fa fa-save",
      "disabled"       =>  "",
      "legend"         =>  "Registrar Información"
     ));


?>              
</center>
</div>

<!--   	</form>	 -->
<?php

$form->closeForm();

?>


</div>
           

<!--   ---------------------- Ends Form Reg ---------------------   -->


      </div>
    </div>
  </div>
</div>