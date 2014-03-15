
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Consulta de usuario</title>

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
    <div class="col-xs-8 well nopadding">

       <?php
$cedula=$_GET['cedulau'];
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select nom_usu,habil,ape_usu,cedula_usu,usuario,correo,categoria,correo_al from usuario where cedula_usu='$cedula'";
$con=mysql_query($cons);
$r=mysql_fetch_assoc($con);
$nom=$r['nom_usu'];
$ape=$r['ape_usu'];
$ced=$r['cedula_usu'];
$usu=$r['usuario'];
$cor=$r['correo'];
$cor2=$r['correo_al'];
$habil=$r['habil'];
if($r['correo_al']=='Null'){
$cor2="No tiene";
}else{
$cor2=$r['correo_al'];
}
$cat=$r['categoria'];
$s=mysql_num_rows($con);
if($con){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");}
$exito=1;
?>    
<?php if($s!=0 && $exito==1){
echo '<center><h2>Datos relacionados al usuario</h2></br></center>';


echo sprintf("<table class='table table-bordered'>");
echo sprintf("<tr>");
echo "<td><center>Nombres y apellidos</center></td>";
echo  "<td><center>Cedula de Identidad</center></td>"; 
echo  "<td><center>Id. de Usuario</center></td>";
echo "<td><center>Categoria</center></td>"; 
echo "<td><center>Correo Electronico</center></td>";
echo "<td><center>Correo Alternativo</center></td>";
echo "<td><center>Esta habilitado</center></td>";
echo sprintf("</tr>");
 
echo sprintf("<tr>");
echo "<td><center>$nom $ape</center></td>";
echo  "<td><center>$ced</center></td>"; 
echo  "<td><center>$usu</center></td>";
echo "<td><center>$cat</center></td>"; 
echo "<td><center>$cor</center></td>";
echo "<td><center>$cor2</center></td>";
echo "<td><center>$habil</center></td>";
echo sprintf("</tr>");

echo sprintf("</table>");

echo '<form class="form-inline" action="modifica_usu.php" method="get">';
echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula);

echo'<center>';
echo sprintf("<div class='form-group'>");
echo '<input type="button" Class="hidden-print btn btn-success" onclick="submit();" value="Modificar datos"/>&nbsp;';
echo '<input type="button" value="Imprimir datos" Class="hidden-print btn btn-info" onclick="window.print();return false;"/>';

echo sprintf("</div>");
echo '</center>';
echo '</form>';
}else{
echo '</br></br></br></br></br>';
echo '<center>No existe el registro de la c&eacute;dula ingresada.</center></br></br>';}
if($exito==0){
echo '</br></br></br></br></br>';
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
