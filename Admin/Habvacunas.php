
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Agregar vacunas</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script language="JavaScript" type="text/JavaScript">
window.onload = function () {
    document.getElementById("vacun").onclick = modificarEstado;
    document.getElementById("vacn").onclick = modificarEstado;
}
function modificarEstado(){

    if (document.getElementById("vacun").checked) {
        document.getElementById("fecha_va").disabled = false;
        document.getElementById("fecha_re").disabled = false;
    }

    if (document.getElementById("vacn").checked) {
        document.getElementById("fecha_va").disabled = true;
        document.getElementById("fecha_re").disabled = true;
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
$cons="Select cod_va,nom_va,tipo_va from `vacuna` where habil='Si'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Vacunas habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<form class="form-signin" id="form2" name="form2" method="post" action="elimina_vacuna.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='vacu[]' id='vacu[]' type='checkbox' value='".$row["cod_va"]."'></td><td>".$row["nom_va"]."</td>. Tipo: <td>".$row["tipo_va"]."</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Eliminar Vacunas" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No existen Vacunas habilitadas </h4>';
mysql_query("rollback");}
?>    

</br>
                          </div>
        <div class="col-lg-6">
          <h4>Agregar vacuna:</h4>
<form class="form-signin" id="form2" name="form2" method="get" action="envia_vacuna.php" class="form-horizontal">
          
             <div class="form-group">
<input type="text" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" name="vacuna" title="Solo debes introducir letras" class="form-control" placeholder="Ej: tetano" required="required" autofocus>
          <label for="tipo" class="col-lg-10 control-label">Tipo de vacuna</label> <select name="tipo" class=" form-control" required="required">
				<option value=""></option>
				<option value="Subcutanea">Subcutanea</option>
				<option value="Intravenosa">Intravenosa</option>
                <option value="Intramuscular">Intramuscular</option>
                <option value="Intradermica">Intradermica</option>
			</select>

             <label for="descripcion" class="col-lg-12 control-label">Introduzca una breve descripcion</label><textarea name="descripcion" class="form-control"/> </textarea/>
             </div>       
<center><input name="Button1" type="submit" value="Agregar Vacuna" class="btn  btn-danger" /> </center>   
</fieldset>       
          </form>
                 </div>
      </div>        
    
<?php require('../footer.html') ?>
 </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

