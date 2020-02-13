<?php

class Form {

	/*function form($name, $method, $action, $role, $enctype, $class, $accept_charset){
		echo "<form name='$name' method='$method' action='$action' role='$role' $enctype class='$class' 
    accept-charset='$accept_charset'>";
	}*/

  function form($name, $method, $action, $charset){
    echo '<form name="'.$name.'" method="'.$method.'" action="'.$action.'" accept-charset="'.$charset.'">';
  }


	function formNew($name, $method, $action, $role, $enctype, $target){
    echo "<form name='$name' method='$method' action='$action' role='$role' $enctype class='$class' target='$target'>";

  }//form function

   function verifyParams($array, $limit, $type){
           if (count($array) <> $limit){
                echo 'faltan parámetros para agregar un campo tipo <b>' . $type . '</b>... solo pasó <b>' . count($array) . '</b> de <b>' . $limit . '</b>.';
                return 0;
           }
           else{
                return 1;  //Return1=true
           }
  }//function verifyParams
  

   //Parametros [tipo_de_elemento_de_formulario, array_de_parametros]
  function addField($type, $p){
    switch ($type){
      case 1: //text
          if ($check = $this -> verifyParams($p, 15, "TEXTO")){

        /*
        1. nombre del campo = user_name -> $p["field_name"]
        2. etiqueta texto  -> $p["label_field"]
        3. solo lectura -> $p["readonly"]
        4. deshabilitado -> $p["disabled"]
        5. value -> $p["val_field"]
        6. longitud maxima -> $p["maxlength"]
        7. tamaño -> $p["size"]
        8. style -> $["style"]
        9. javascript ->$p["js"]
        10.placeholder -> $p["placeholder"]
        11. required -> $p["required"]
        12. autofocus -> $p["autofocus"]

        13. class_label -> $p["class_label"]
        14. div_field -> $p["div_field"]
        15 input_class -> $p["input_class"] --> form-control

        */

         echo '<div class="form-group">
                <label class="' . $p["class_label"] .'" for="'. $p["field_name"] . '"><b> ' . $p["label_field"] . '</b></label> 
                <div class="' . $p["div_field"] . '">
                  <input type="text" name="' . $p["field_name"] . '" class="' . $p["input_class"] . '" id="' . $p["field_name"] . '" ' .
                  $p["readonly"] . ' ' . $p["disabled"] . ' value="' . $p["value"] . '" maxlength="' . $p["maxlength"] . '" size="' .
                   $p["size"] . '" style="'. $p["style"] . '" ' . $p["js"] . '    placeholder="' . $p["placeholder"] .
                  '" '. $p["required"]. ' ' . $p["autofocus"] . ' autocomplete="off" />
                </div>
              </div>';
          echo '<div class="space">&nbsp;</div>';



            }
        break;
               case 2: //password
                   if ($check = $this -> verifyParams($p, 15, "PASSWORD")){
                       /*echo "<input type='password' name='$p[nombre]' maxlength='$p[maxlength]' size='$p[size]' style='$p[style]' $p[js]>";   */
                    /*
                1. class_label
                2. field_name
                3. label_field
                4. div_field
                5. input_class
                6. value
                7. placeholder
                8. required
                9. autofocus
                $form -> addField(2, array(
                          "field_name"    =>  "user_pass",
                          "class_label"   =>  "control-label col-md-3 col-sm-3 col-xs-12",
                          "label_field"   =>  "Contraseña Antigua",
                          "div_field"     =>  "col-md-6 col-sm-6 col-xs-12",
                          "input_class"   =>  "date-picker form-control col-md-7 col-xs-12",
                          "value"         =>  "",
                          "placeholder"   =>  "**********",
                          "required"      =>  "required",
                          "autofocus"     =>  "autofocus"

                */

                echo '<div class="form-group">
                        <label class="' . $p["class_label"] .'" for="'. $p["field_name"] . '"><b> ' . $p["label_field"] . '</b></label> 
                        <div class="' . $p["div_field"] . '">
                          <input type="password" name="' . $p["field_name"] . '" class="' . $p["input_class"] . '" id=" ' . $p["field_name"] . '" ' .
                          $p["readonly"] . ' ' . $p["disabled"] . ' value="' . $p["value"] . '" maxlength="' . $p["maxlength"] .
                          '" size="' . $p["size"] . '" style="'. $p["style"] . '" ' . $p["js"] . ' placeholder="' . $p["placeholder"] .
                          '" '. $p["required"]. ' ' . $p["autofocus"] . '/>
                        </div>
                      </div>';

                   }
               break;
        case 3: //submit-button
        if ($check = $this -> verifyParams($p, 6, "SUBMIT")){
             
              echo '<button type="submit" name="' . $p["name"] . '" class="' . $p["type_button"] . '" ' . $p["disabled"] . ' data-toggle="tooltip" data-placement="top" title="'. $p["tooltip"] . '"><i class="' . $p["icon"] . '"></i> &nbsp;&nbsp;' . $p["legend"] . '</button>';
            }
        break;
        case 4: //hidden
            if ($check = $this -> verifyParams($p, 2, "HIDDEN")){
                /*echo "<input name='$p[nombre]' type='hidden' value='$p[value]'/>";*/
                /*<input type="hidden" value="<?php echo $usuario->id ?>" name="usuario_id" />*/
                echo '<input type="hidden" value="' . $p["value"] . '" name="' . $p["field_name"] . '" />';
            }
        break;
        case 5:
          if ($check = $this -> verifyParams($p, 5, "EMAIL")){
            /*
          1. nombre del campo = user_name -> $p["field_name"]
          2. etiqueta texto  -> $p["label_field"]
        3. value -> $p["value"]
        4. placeholder -> $p["placeholder"]
        5. required -> $p["required"]
          */

            echo '<div class="form-group">
                        <label for="' . $p["field_name"] . '">' . $p["label_field"] . '</label>
                          <input type="email" value="' .$p["value"] . '" name="' . $p["field_name"] . '" class="form-control" id="' .
                           $p["field_name"] . '" placeholder="' . $p["placeholder"] . '" ' . $p["required"]. '/>
                      </div>';
          }
        break;
        case 6:
          if ($check = $this -> verifyParams($p, 11, "EMAIL")){
            /*
          1. nombre del campo = user_name -> $p["field_name"] ->ok
          2. etiqueta texto  -> $p["label_field"] -> ok
          3. value -> $p["value"] -> ok
          4. placeholder -> $p["placeholder"] ->
          5. id -> $p["required"]
            rows ->
          */

            echo '<div class="form-group">
                        <label for="' . $p["field_name"] . '">' . $p["label_field"] . '</label>
                          <textarea  value="' .$p["value"] . '" name="' . $p["field_name"] . '" class="form-control" id="' .
                           $p["field_name"] . '" placeholder="' . $p["placeholder"] . '" ' . $p["required"]. ' rows=' . $p["rows"] . '>' . $p["value"] . '</textarea>
                  </div>';
          }
        break;
          case 7: //TEL
          if ($check = $this -> verifyParams($p, 15, "TEL")){

        /*
        1. nombre del campo = user_name -> $p["field_name"]
        2. etiqueta texto  -> $p["label_field"]
        3. solo lectura -> $p["readonly"]
        4. deshabilitado -> $p["disabled"]
        5. value -> $p["val_field"]
        6. longitud maxima -> $p["maxlength"]
        7. tamaño -> $p["size"]
        8. style -> $["style"]
        9. javascript ->$p["js"]
        10.placeholder -> $p["placeholder"]
        11. required -> $p["required"]
        12. autofocus -> $p["autofocus"]
        13. "class_label"   =>  "",
        14. "div_field"     =>  "",
        15. "input_class"   =>  "col-md-12",
        */

                 echo '<div class="form-group">
                        <label class="' . $p["class_label"] .'" for=" '. $p["field_name"] . ' "><b> ' . $p["label_field"] . '</b></label>
                      <div class="' . $p["div_field"] . '">  
                          <input type="tel" name="' . $p["field_name"] . '" class="' . $p["input_class"] . '" id=" ' . $p["field_name"] . '" ' .
                          $p["readonly"] . ' ' . $p["disabled"] . ' value="' . $p["value"] . '" maxlength=' . $p["maxlength"] .
                          'size=' . $p["size"] . 'style='. $p["style"] . ' ' . $p["js"] . '    placeholder="' . $p["placeholder"] .
                          '" '. $p["required"]. ' ' . $p["autofocus"] . '/>
                        </div>
                      </div>';
                echo '<div class="space">&nbsp;</div>';



            }
        break;
        case 8: //EMAIL
          if ($check = $this -> verifyParams($p, 15, "Email")){



                 echo '<div class="form-group">
                        <label class="' . $p["class_label"] .'" for=" '. $p["field_name"] . ' "><b> ' . $p["label_field"] . '</b></label>
                       <div class="' . $p["div_field"] . '">    
                          <input type="email" name="' . $p["field_name"] . '" class="' . $p["input_class"] . '" id=" ' . $p["field_name"] . '" ' .
                          $p["readonly"] . ' ' . $p["disabled"] . ' value="' . $p["value"] . '" maxlength=' . $p["maxlength"] .
                          'size=' . $p["size"] . 'style='. $p["style"] . ' ' . $p["js"] . '    placeholder="' . $p["placeholder"] .
                          '" '. $p["required"]. ' ' . $p["autofocus"] . '/>
                        </div>
                      </div>';



            }
        break;

        case 9: //textarea
          if ($checa = $this -> verifyParams($p, 12, "TEXTAREA")){

            /*
                          "field_name"    =>  "about",
                          "label_field"   =>  "Breve descripción del Usuario:",
                          "readonly"      =>  "",
                          "disabled"      =>  "",
                          "value"         =>  "about",
                          "rows"        =>  "3",
                          "cols"          =>  "",
                          "style"         =>  "",
                          "js"            =>  "",
                          "placeholder"   =>  "Sobre el usuario...",
                          "content"       =>  "$about",
                          "required"      =>  "required"
            <textarea name='$p[nombre]' $p[readonly] $p[disabled] rows='$p[rows]' cols='$p[cols]' style='$p[style]' $p[js]>$p[valor]</textarea>";

            */

              echo '<div class="form-group">
                      <label for="'. $p["field_name"] . '"> ' . $p["label_field"] . '</label>
                      <textarea value="' . $p["value"] . '" name="' . $p["field_name"] . '" ' . $p["readonly"] . ' ' . $p["disabled"] . ' rows="' . $p["rows"]
                      . '" cols="' . $p["cols"]  . '" class="form-control" style="' . $p["style"] . '" required="' . $p["required"] . '" ' . $p["js"]
                      . ' placeholder="'. $p["placeholder"] . '">' . $p["content"] . '</textarea>
                    </div>
              ';


          }
          break;

        case 10: //textarea
          if ($checa = $this -> verifyParams($p, 11, "RADIO")){

            /*
            "field_name"  = "yes_no_radio_create",
              "class_label" = "",
              "label_field" = "¿Este privilegio puede crear contenido?",
              "name_option" =>  "yes_no_create",
              "div_field"     =>  "",
              "input_class"   =>  "col-md-8",
              "readonly"      =>  "",
              "disabled"      =>  "",
              "value_no"    =>  "N",
              "value_yes"   =>  "Y"

            */

              echo '
              <table border="0" >            
              <div class="form-group" id="wrapper">
                <tr>
                <td width="350">
    
                  <label for="' . $p["field_name"] . '"> ' . $p["label_field"] . '</label> 
                  </td>';

                  if ($p["selected"] == false){

                  echo '<td width="50" align="center">
                    <input type="radio" name="' . $p["name_option"] . '" value="' . $p["value_no"] . '" checked>No</input> 
                  </td>
                  <td width="50" align="center">
                     <input type="radio" name="' . $p["name_option"] . '" value="' . $p["value_yes"] . '">Si</input>
                  </td>';
                  }else{
                    echo '<td width="50" align="center">
                    <input type="radio" name="' . $p["name_option"] . '" value="' . $p["value_no"] . '" >No</input> 
                  </td>
                  <td width="50" align="center">
                    <input type="radio" name="' . $p["name_option"] . '" value="' . $p["value_yes"] . '" checked>Si</input>
                  </td>';

                  }


                  echo '</label>
                </tr>
              </div>
              </table>
            ';


          }
          break;

          case 11: //Checkboxes
           if ($checa = $this -> verifyParams($p, 6, "CHECKBOX")){
            /*
            "field_name"  = "checkbox_name",
              "label_field" = "¿Este privilegio puede crear contenido?",
              "readonly"      =>  "",
              "disabled"      =>  "",
              "value"         =>  "",
              "legend"        => ""              


              <!-- Default unchecked -->
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
</div>

            */
            


              echo '
              <table border="0" >            
              <div class="form-group" id="wrapper">
                <tr>
                <td width="">
    
                  <label for="' . $p["field_name"] . '"> ' . $p["label_field"] . '</label> 
                  
                    <input type="checkbox" name="' . $p["field_name"] . '" value="' . $p["value"] . '">' . $p["legend"] . '</input> 
                  </td>
                  ';
                  

                  echo '</label>
                </tr>
              </div>
              </table>
            ';


          }
        break;



        default: //
                echo 'Error al agregar el campo, opción no valida <b>' . ($type). '</b>...el programa abortó.';
        exit;

    }//switch

  }//function addFlield


   function closeForm(){
    echo "</form>";
        return 1;
    }//closeForm

}// Form Class