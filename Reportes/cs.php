
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Lista de coordinadores y secretarias</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  <?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select * from usuario where categoria != 'Profesor' and categoria != 'Administrador'";
$con=mysql_query($cons);
$s=mysql_num_rows($con);
if($con){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");}
$exito=1;
?>    
  </head>

  <body>
 <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">

<?php if($s!=0 && $exito==1){
echo '</br></br>';
echo '<center><h4 class="form-signin-heading"><span lang="es">Lista de coordinadores/secretarias actualmente en el Sistema</span></h4></br></br></center>';
echo '<table class="table table-bordered" align="center">';
echo '<th scope="col"><center>Cedula de Identidad</center></th>';
echo '<th scope="col"><center>Nombres del Usuario</center></th>';
echo '<th scope="col"><center>Id. de Usuario</center></th>';
echo '<th scope="col"><center>Categor&iacute;a</center></th>';
while($r=mysql_fetch_assoc($con)){
$nom=$r['nom_usu'];
$ape=$r['ape_usu'];
$ced=$r['cedula_usu'];
$usu=$r['usuario'];
$cat=$r['categoria'];
echo '<tr>';
echo "<td><center>$ced</center></td>";
echo "<td ><center>$nom $ape</center></td>";
echo "<td ><center>$usu</center></td>";
echo "<td ><center>$cat</center></td>";
echo '</tr>';
}echo '</table>';
echo '</br></br>';
echo '<center>';
echo date("d-m-Y"); echo ' / '; echo date("H:i:s");
echo '</center>';
echo '<center></br></br></br><form><input type="button" class="btn btn-success hidden-print" value="Imprimir datos" onclick="window.print();return false;"/></form></center>';
}else{

echo '<center></br></br>No existen usuarios registrados.</center></br></br>';}
if($exito==0){

echo '<center></br></br>Problema al conectar con la Base de datos. Intenta mas tarde.</center></br></br>';}
?>
                          </div>    
    
<?php require('../footer.html') ?>
</div> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
