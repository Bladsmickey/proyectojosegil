
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Agregar materias</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script language="JavaScript" type="text/JavaScript">
window.onload = function () {
    document.getElementById("1eroo").onclick = modificarEstado;
    document.getElementById("2doo").onclick = modificarEstado;
    document.getElementById("3roo").onclick = modificarEstado;
    document.getElementById("4too").onclick = modificarEstado;
    document.getElementById("5too").onclick = modificarEstado;
}
function modificarEstado(){

    if (document.getElementById("1eroo").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("2doo").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("3roo").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("4too").checked) {
        document.getElementById("mencion").disabled = false;
    }

    if (document.getElementById("5too").checked) {
        document.getElementById("mencion").disabled = false;
    }
}
</script>


  </head>
  <body>
 <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">
       
 <div class="col-lg-6">
        
       <?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select * from `materia` where habil='Si'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Materias habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
if($row['ano_mat']==1){ $ano="1er a&ntilde;o"; }
if($row['ano_mat']==2){ $ano="2do a&ntilde;o"; }
if($row['ano_mat']==3){ $ano="3er a&ntilde;o"; }
if($row['ano_mat']==4){ $ano="4to a&ntilde;o"; }
if($row['ano_mat']==5){ $ano="5to a&ntilde;o"; }
if($row['mencion']=="null" || $row['mencion']=="Null"){
$mencion="No tiene";}
else{
$mencion=$row['mencion'];}
echo '<form class="form-signin" id="form2" name="form2" method="post" action="elimina_materia.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='mate[]' id='mate[]' type='checkbox' value=".$row['cod_mat']."></td><td>".'Materia: '.$row['nom_mat']." </td> <td>".'A&ntilde;o: '.$ano." <td>".'Mencion: '.$mencion." </td></td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Eliminar Materia" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No existen materias </h4>';
mysql_query("rollback");}
?>    

</br>
                          </div>
        <div class="col-lg-6">
          <h4>Agregar materia:</h4>
<form class="form-signin" id="form2" name="form2" method="get" action="envia_materia.php" class="form-horizontal">
          
             <div class="form-group">
<input type="text" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" name="seccion" class="form-control" placeholder="Ej: Quimica" title="Solo debes introducir letras" required="required" autofocus>
        <label class="control-label" >
A&ntilde;o<label class="radio-inline" id="vacuna">1ero<input name="ano" type="radio" id="1eroo" value="1ero" >	</label><label class="radio-inline" id="vacuna">2do<input type="radio" name="ano" id="2doo" value="2do"></label> </label><label class="radio-inline" id="vacuna">3ro<input type="radio" name="ano" id="3roo" value="3ro"></label> </label><label class="radio-inline" id="vacuna">4to<input type="radio" name="ano" id="4too" value="4to"></label></label><label class="radio-inline" id="vacuna">5to<input type="radio" name="ano" id="5too" value="5to"></label></br>       
             <label for="descripcion" class="col-lg-12 control-label">Mencion</label>
             <Select id="mencion" name="mencion" class="form-control"> 
             <option>Ciencias</option> 
             <option>Humanidades</option> 
             <option>Contabilidad</option> </Select></br>
      </div>       
<center><input name="Button1" type="submit" value="Agregar Materia" class="btn  btn-danger" /> </center>   
</fieldset>       
          </form>
                 </div><?php require('../footer.html') ?>
      </div>        
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

