
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Consulta de estudiante</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <link href="../dist/css/main.css" rel="stylesheet">



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
$cedula=$_GET['cedulae'];
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select nome,apee,ced_e,edad,lugar_nac,direccion,telefono,seccion,anho_est,mencion,turno from estudiante,secciones where estudiante.ced_e='$cedula' and secciones.habil='Si'";
$con=mysql_query($cons);
$conss="Select nom,edad_r,tlf_rep,pare_r,ape,ci_r,profesion,dir_tra,tlf_tr from representante where ci_e='$cedula'";
$conn=mysql_query($conss);
$r=mysql_fetch_assoc($con);
$nom=$r['nome'];
$ape=$r['apee'];
$ced=$r['ced_e'];
$nac=$r['lugar_nac'];
$edad=$r['edad'];
$dir=$r['direccion'];
$tel=$r['telefono'];
$secc=$r['seccion'];
$ano=$r['anho_est'];
$men=$r['mencion'];
$tur=$r['turno'];
if($r['mencion']=='Null'){
$men="Vacio";
}else{
$men=$r['mencion'];
}
$rr=mysql_fetch_assoc($conn);
$nomr=$rr['nom'];
$aper=$rr['ape'];
$cedr=$rr['ci_r'];
$prof=$rr['profesion'];
$dirr=$rr['dir_tra'];
$telr=$rr['tlf_tr'];
$paren=$rr['pare_r'];
$telemer=$rr['tlf_rep'];
$edadr=$rr['edad_r'];
$s=mysql_num_rows($con);
if($con && $conn){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");}
$exito=1;
?>    

<?php if($s!=0 && $exito==1){
echo '<center><h3>Datos relacionados al estudiante</h3></br></center>';
echo '<legend> <h4>Datos del estudiante</h4></legend>';

echo sprintf("<table class='table table-bordered pull-left'>");
echo sprintf("<tr>");
echo "<td><center><b>Nombres y apellidos</b></center></td>";
echo  "<td><center><b>Cedula de Identidad</b></center></td>"; 
echo  "<td><center><b>Edad</b></center></td>";
echo "<td><center><b>Lugar de nacimiento</b></center></td>";
echo "<td><center><b>Direccion</b></center></td>"; 
echo "<td><center><b>Telefono</b></center></td>";
echo "<td><center><b>Seccion</b></center></td>";
echo "<td><center><b>A&ntilde;o</b></center></td>";
echo "<td><center><b>Mencion</b></center></td>";
echo "<td><center><b>turno</b></center></td>";
echo sprintf("</tr>");
 
echo sprintf("<tr>");
echo "<td><center>$nom $ape</center></td>";
echo  "<td><center>$ced</center></td>"; 
echo  "<td><center>$edad</center></td>";
echo "<td><center>$nac</center></td>";
echo "<td><center>$dir</center></td>"; 
echo "<td><center>$tel</center></td>";
echo "<td><center>$secc</center></td>";
echo "<td><center>$ano</center></td>";
echo "<td><center>$men</center></td>";
echo "<td><center>$tur</center></td>";
 echo sprintf("</tr>");

echo sprintf("</table>");


 echo '<legend> <h4>Datos del Representante</h4></legend>';



echo sprintf("<table class='table table-bordered'>");

echo sprintf("<tr>");

echo "<td><center><b>Nombres y apellidos</b></center></td>";
echo "<td><center><b>Cedula de Identidad</b></center></td>";
echo "<td><center><b>Parentesco</b></center></td>";
echo "<td><center><b>Edad</b></center></td>";
echo "<td><center><b>Profesion</b></center></td>";
echo "<td><center><b>Direccion de trabajo</b></center></td>";
echo "<td><center><b>Telefono de trabajo</b></center></td>";
echo "<td><center><b>Telefono de emergencia</b></center></td>";
echo sprintf("</tr>");

echo sprintf("<tr>");
echo "<td><center>$nomr $aper</center></td>";
echo  "<td><center>$cedr</center></td>";
echo "<td><center>$paren</center></td>";
echo "<td><center>$edadr</center></td>";
echo "<td><center>$prof</center></td>";
echo "<td><center>$dirr</center></td>"; 
echo "<td><center>$telr</center></td>";
echo "<td><center>$telemer</center></td>";
echo sprintf("</tr>");


echo sprintf("</table>");


echo '<form action="../planilla.php" method="get">';
echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula);
echo'<center>';
echo sprintf("<div class='form-group'>");
echo '<input type="button" Class="hidden-print btn btn-success" onclick="submit();" value="Ir a la planilla"/>&nbsp;';
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
