
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Listado por seccion y a&ntilde;o</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<?php
require("../conexion.php");
$ano=$_GET['vacu'];
$secc=$_GET['seccion'];
@$mencion=$_GET['mencion'];
if(!isset($_GET['mencion'])){
$cons="SELECT nome,apee,ced_e,condicion,anho_est,mencion,turno from estudiante,secciones where estudiante.ced_e = secciones.ce_e and secciones.anho_est = '$ano' and secciones.seccion = '$secc' and secciones.habil='Si'";
$con=mysql_query($cons);
$b=mysql_num_rows($con);
}else{
$cons="SELECT nome,apee,ced_e,condicion,anho_est,mencion,turno from estudiante,secciones where estudiante.ced_e = secciones.ce_e and secciones.anho_est = '$ano' and secciones.seccion = '$secc' and secciones.mencion = '$mencion' and secciones.habil='Si'";
$con=mysql_query($cons);
$b=mysql_num_rows($con);
}
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

<?php if($exito==0 && $b!=0){
echo '<center><h2 class="form-signin-heading"><span lang="es">Lista de estudiantes actualmente en la seccion '.$secc.' del '.$ano.' a&ntilde;o</span></h2></br></center>';
echo '<table width="80%" border="1" align="center">';
echo '<th scope="col"><center>Cedula de Identidad</center></th>';
echo '<th scope="col"><center>Nombres del Estudiante</center></th>';
echo '<th scope="col"><center>Condici&oacute;n</center></th>';
echo '<th scope="col"><center>A&ntilde;o</center></th>';
echo '<th scope="col"><center>Menci&oacute;n</center></th>';
echo '<th scope="col"><center>Turno</center></th>';
while($r=mysql_fetch_assoc($con)){
$nom=$r['nome'];
$ape=$r['apee'];
$ced=$r['ced_e'];
$cond=$r['condicion'];
$ano=$r['anho_est'];
$men=$r['mencion'];
$tur=$r['turno'];
if($r['mencion']=='Null'){
$men="Vacio";
}else{
$men=$r['mencion'];
}
echo '<p>';
echo '<tr>';
echo "<th scope='col'><center>V-<a href=consulta_estudiante.php?cedulae=".$ced.">$ced</a></center></th>";
echo "<th scope='col'><center>$nom $ape</center></th>";
echo "<th scope='col'><center>$cond</center></th>";
echo "<th scope='col'><center>$ano</center></th>";
echo "<th scope='col'><center>$men</center></th>";
echo "<th scope='col'><center>$tur</center></th>";
echo '</tr>';
echo "</p>";
}echo '</table>';
echo '</br></br>';
echo '<center>';
echo date("d-m-Y"); echo ' / '; echo date("H:i:s");
echo '</center>';
echo '<center></br></br></br><form><input type="button" Class="hidden-print" value="Imprimir datos" onclick="window.print();return false;"/></form></center>';
}
if($b==0){

echo '<center></br></br>No existen estudiantes inscritos en esa seccion y ese a&ntilde;o.</center></br></br>';
}
else{

echo '<center></br></br>Problema al conectar con la Base de Datos.</center></br></br>';}
?>

    </div> <!-- /container -->
    
    
<?php require('../footer.html') ?>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
