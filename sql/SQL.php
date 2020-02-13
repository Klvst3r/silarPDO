<?php
class SQL {

var $IdConexion=0;

var $errNo=0;
var $errMsg = "";
var $errMsg2="";

function runQuery($link, $consulta){

         $this->IdConexion=mysqli_query($link, $consulta);
         if (!$this->IdConexion){
              $this->errMsg="Error al ejecutar la consulta <i>$consulta</i>";
              $this->errNo=mysqli_errno($link);
              $this->errMsg2=mysqli_error($link);
              $this->error();
              exit();
              return 0;
         }
         else{
              return $this->IdConexion;
         }
}// runQuery

function filas(){
         return mysqli_num_rows($this->IdConexion);
}//filas

function data(){
         return mysqli_fetch_array($this->IdConexion);
}//array

function error(){
         echo "<br><font face='verdana' size=2> &nbsp;&nbsp;&nbsp;&nbsp;";
         echo $this->errMsg." <br><br>&nbsp;&nbsp;&nbsp;&nbsp;Favor de reportarlo con administrador del sistema</font><br><bR>";
         ?>
         <center>
         <br>
         <table border="1" width="500" id="table1" bordercolor="#FF9900" style="border-collapse: collapse">
        <tr>
                <td colspan="2" align="center" bgcolor="#FFCC66"><b>
                <font face="Verdana" size="2">Detalles del Error</font></b></td>
        </tr>
        <tr>
                <td width="72" align="center" bgcolor="#FFCC66">
                <font face="Verdana" size="2">C�digo</font></td>
                <td width="412" align="center" bgcolor="#FFCC66">
                <font face="Verdana" size="2">Descripci�n</font></td>
        </tr>
        <tr>
                <td width="72" align="center"><?php echo $this->errNo;?></td>
                <td width="412" align="center"><?php echo $this->errMsg2;?></td>
        </tr>
        </table>
        </center> <br>
         <?php
         echo "<br><center><input type='button' value=' Regresar ' style='color: #FFFFFF; font-family: Verdana; font-weight: bold; border: 1px solid #FFCC66; background-color: #CC9900' OnClick='history.go(-1)'></center><bR><br>";
}//error

function combo($link, $query, $name, $value, $enable, $onchange, $iniselect){

        
        /* if ($this->runQuery($link, $query)){
            echo "<select name='$name' style='font-family: Verdana; font-size: 9pt; border: 1px solid #C0C0C0' $enable $onchange>";
         if ($this->filas()==0)
            echo "<option value='0'>'No hay opciones !!'</option>";
         else{
              if ($iniselect==1)
                echo "<option value='0'>[ Seleccione una opcion ]</option>";
              while(list($id,$descrip)=mysqli_fetch_row($this->IdConexion))
              {
               if ($id==$value)
                   echo "<option selected value='$id'>$descrip</option>";
               else
                   echo "<option value='$id'>$descrip</option>";
              }
         }//end else
         echo "</select>";
         }*/
}//combo

function table($link, $query){
        if ($this->runQuery($link, $query)){
                $columnas=mysqli_num_fields($this->IdConexion);
                echo "<center><table border='1' style='border-collapse: collapse' bordercolor='#000066'>";
                echo "<tR>";
                while ($nameField = mysqli_fetch_field($this->IdConexion)){                    
                     echo "<td bgcolor='#000000'><font face='verdana' size=2 color='#FFFFFF'><strong>".$nameField->name."</strong></td>";
                }
                echo "</tr>";
                for($i=0; $i<$this->filas(); $i++){
                    echo "<tr>";
                    $dump = $this -> data();                        
                    for ($j=0; $j<$columnas; $j++){                        
                         echo "<td bgcolor='#FFFFFF'><font face='verdana' size=2 color='#000000'>$dump[$j]</td>";
                    }
                    echo "</tr>";
                }                                                                                        
                echo "</table></center><br>";
        }
}//table

function tableUsers($link, $query){
        if ($this->runQuery($link, $query)){
                $columnas=mysqli_num_fields($this->IdConexion);
                echo '<table class="table table-hover">';
                echo '<thead>
                        <tr>';
                while ($nameField = mysqli_fetch_field($this->IdConexion)){                    
                     echo '<th>'.$nameField->name.'</th>';
                }
                echo '</tr>
                      </thead>
                      <tbody>';
                for($i=0; $i<$this->filas(); $i++){
                    echo "<tr>";
                    $dump = $this -> data();                        
                    for ($j=0; $j<$columnas; $j++){                        
                         echo '<td>'.$dump[$j].'</td>';
                    }
                    echo "</tr>";
                }                                                                                        
                echo "</tbody></table><br/>";
        }
}//table

function libera(){
    mysqli_free_result($this->IdConexion);   
}

/*function test(){
    echo "testing, testing..";
}*/

function cierra($link){
    mysqli_close($link);   
}//cierra

}//class
?>