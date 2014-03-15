
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Lista de estudiantes</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
     <link href="examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
  <div class="wrap">

<?php require("header.php"); ?>
</div>

     <div class="container">
</br></br></br></br></br>
<center><img src="imagenes/logoo.jpg" width="1000" height="100"></center>        
<?php
$secc=$_GET['seccion'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select nome,apee,ced_e,condicion,anho_est,mencion,turno from estudiante,secciones where secciones.seccion='$secc' and estudiante.ced_e=secciones.ce_e and secciones.habil='Si'";
$con=mysql_query($cons);
$b=mysql_num_rows($con);
if($con){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");
$exito=1;}
?>    

</br></br>
<?php if($exito==0 && $b!=0){
echo '</br></br>';
echo '<center><h2 class="form-signin-heading"><span lang="es">Lista de estudiantes actualmente en la seccion '.$secc.'</span></h2></br></br></center>';
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
}else{
echo '</br></br></br></br>';
echo '<center></br></br>Problema al conectar con la Base de Datos.</center></br></br>';}
?>
                          </div>    
    
<?php require('footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
