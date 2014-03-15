
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Consulta de profesor</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="container">
     <?php require('../header.php'); ?> 

     <div class="col-md-8 well nopadding">
  
       <?php
$cedula=$_GET['cedulap'];
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select nom_prof,ape_prof,cedu_prof,usuario,direc_prof,tlf_prof from profesores,usuario where cedu_prof='$cedula' and cedula_usu='$cedula'";
$con=mysql_query($cons);
$r=mysql_fetch_assoc($con);
$nom=$r['nom_prof'];
$ape=$r['ape_prof'];
$ced=$r['cedu_prof'];
$usu=$r['usuario'];
$tlf=$r['tlf_prof'];
$dir=$r['direc_prof'];
$s=mysql_num_rows($con);
if($con){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");}
$exito=1;
?>    

<?php if($s!=0 && $exito==1){

echo '<center><h2>Datos relacionados al profesor</h2></center>';

echo sprintf("<table class='table table-bordered'>");
echo sprintf("<tr>");
echo "<td><b><center>Nombres y apellidos</center></b></td>";
echo  "<td><b><center>Cedula de Identidad</center></b></td>"; 
echo  "<td><b><center>Id. de Usuario</center></b></td>";
echo "<td><b><center>Direccion</center></b></td>"; 
echo "<td><b><center>Telefono</center></b></td>";
echo sprintf("</tr>");
 
echo sprintf("<tr>");
echo "<td><center>$nom $ape</center></td>";
echo  "<td><center>$ced</center></td>"; 
echo  "<td><center>$usu</center></td>";
echo "<td><center>$dir</center></td>"; 
echo "<td><center>$tlf</center></td>";
echo sprintf("</tr>");

echo sprintf("</table>");


echo '<form action="modifica_prof.php" method="get">';
echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula);
echo'<center>';
echo sprintf("<div class='form-group'>");
echo '<input type="button" Class="hidden-print btn btn-success" onclick="submit();" value="Modificar datos"/>&nbsp;';
echo '<input type="button" value="Imprimir datos" Class="hidden-print btn btn-info" onclick="window.print();return false;"/>';

echo sprintf("</div>");
echo '</center>';
echo '</form>';
}else{
echo '<center>No existe el registro de la c&eacute;dula ingresada.</center></br></br>';}
if($exito==0){
echo '<center>Problema al conectar con la Base de datos. Intenta mas tarde.</center></br></br>';}
?>

</div> 

<?php require('../footer.html') ?>

                       </div>    
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
