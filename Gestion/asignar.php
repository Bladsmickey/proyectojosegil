
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Asignacion de seccion</title>

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
$cons="SELECT DISTINCT seccion FROM seccion_cont where seccion != 'NT' order by seccion";
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
    <div class="col-xs-8 well nopadding">    
        <center><h2><span lang="es">Rellena los siguientes campos</span></h2></center>
      <form class="form-horizontal" id="form2" name="form2" method="get" action="asigna.php">
 <label class="col-lg-2 col-sm-2">C.I.N.V</label>
        <div class="col-lg-10 col-sm-10">
<input type="text" maxlength="8" pattern="[0-9]+" id="cedula" name="cedulae" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required">
</div>
<p class="text-center">
<label class="radio-inline" id="vacuna">1ero<input name="vacu" type="radio" id="1ero" value="1ero" ></label><label class="radio-inline" id="vacuna">2do<input type="radio" name="vacu" id="2do" value="2do"></label> </label><label class="radio-inline" id="vacuna">3ro<input type="radio" name="vacu" id="3ro" value="3ro"></label> </label><label class="radio-inline" id="vacuna">4to<input type="radio" name="vacu" id="4to" value="4to"></label></label><label class="radio-inline" id="vacuna">5to<input type="radio" name="vacu" id="5to" value="5to"></label></p>


     <label for="Select3" class="col-lg-2 col-sm-2">Mencion</label>

                            <div class="col-lg-10 col-sm-10">
                             <select name="menc" id="mencion" class="form-control" required="required">
                            	<option value="">Menci&oacute;n</option>
                            	<option value="Ciencias">Ciencias</option>
                            	<option value="Humanidades">Humanidades</option>
                            	<option value="Contabilidad">Contabilidad</option>
                                    </select></div>
<br><br>
<?php if($exito==0 && $b!=0){
echo '<label for="Select4" class="col-lg-2 col-sm-2">Seccion</label>';
echo '<div class="col-lg-10 col-sm-10">';
echo '<select name="seccion" class="form-control" required="required">';
echo '<option value="">Secci&oacute;n</option>';
while($datos=mysql_fetch_assoc($con)){
echo sprintf("<option>%s</option>",$datos['seccion']);
}
echo '</select></div>
';}
?></br></br>
<p class="text-center">
<button class="btn btn-primary " type="submit">Asignar</button>
         </p>   </form>

    </div> <!-- /container -->
    
    
<?php require('../footer.html') ?>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
