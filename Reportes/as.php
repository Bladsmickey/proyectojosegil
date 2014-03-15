
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Listado por seccion y a&ntilde;o</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script language="JavaScript" type="text/JavaScript">
window.onload = function () {
    document.getElementById("1ero").onclick = modificarEstado;
    document.getElementById("2do").onclick = modificarEstado;
    document.getElementById("3ro").onclick = modificarEstado;
    document.getElementById("4to").onclick = modificarEstado;
    document.getElementById("5to").onclick = modificarEstado;
}
function modificarEstado(){

    if (document.getElementById("1ero").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("2do").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("3ro").checked) {
        document.getElementById("mencion").disabled = true;
    }

    if (document.getElementById("4to").checked) {
        document.getElementById("mencion").disabled = false;
    }

    if (document.getElementById("5to").checked) {
        document.getElementById("mencion").disabled = false;
    }
}
</script>
<?php
require("../conexion.php");
$cons="SELECT DISTINCT seccion FROM secciones where seccion != 'NT' and habil='Si' order by seccion";
$con=mysql_query($cons);
$b=mysql_num_rows($con);
if($con){
mysql_query("COMMIT");
$exito=0;}
else{
mysql_query("rollback");
$exito=1;}
?> 
  </head>

  <body>
         <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 nopadding">

      <form class="form-signin" id="form2" name="form2" method="get" action="as_envia.php">
        <center><h2 class="form-signin-heading"><span lang="es">Rellena los siguientes campos</span></h2></center>
  <div class="form-group">
<label class="radio-inline" id="vacuna">1ero<input name="vacu" type="radio" id="1ero" value="1ero">	</label><label class="radio-inline" id="vacuna">2do<input type="radio" name="vacu" id="2do" value="2do"></label> </label><label class="radio-inline" id="vacuna">3ro<input type="radio" name="vacu" id="3ro" value="3ro"></label> </label><label class="radio-inline" id="vacuna">4to<input type="radio" name="vacu" id="4to" value="4to"></label></label><label class="radio-inline" id="vacuna">5to<input type="radio" name="vacu" id="5to" value="5to"></label></br>
     <label for="Select3"></label>
 <select name="mencion" id="mencion" class="form-control" required="required">
	<option value="">Menci&oacute;n</option>
	<option value="Ciencias">Ciencias</option>
	<option value="Humanidades">Humanidades</option>
	<option value="Contabilidad">Contabilidad</option>
        </select>
<?php if($exito==0 && $b!=0){
echo '<label for="Select4"></label>';
echo '<select name="seccion" class="form-control" required="required">';
echo '<option value="">Secci&oacute;n</option>';
while($datos=mysql_fetch_assoc($con)){
echo sprintf("<option>%s</option>",$datos['seccion']);
}
echo '</select>';}
?>
  </div><button class="btn btn-lg btn-primary btn-block" type="submit">Ver registros</button>
            </form>

    </div> <!-- /container -->
    
    
<?php require('../footer.html') ?>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
