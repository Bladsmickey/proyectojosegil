
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
        
       <?php
$nomb=$_GET["nomcons"];
echo "<br>";
$cadena=explode(' ',$nomb);
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
@$consulta="SELECT * FROM `estudiante` WHERE `nome` like '%$cadena[0]%' and `apee` like '%$cadena[1]%'";
$resultado=mysql_query($consulta);
$total=mysql_num_rows($resultado);
if($resultado){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");}
$exito=1;
?>    

</br></br>
<?php 
$tot=$total;
if($total==0)
{
@$consulta="SELECT * FROM `estudiante` WHERE `nome` like '%$cadena[1]%' and `apee` like '%$cadena[0]%'";
$resultado=mysql_query($consulta);
$total=mysql_num_rows($resultado);
$num=2;
if($total==0){
echo '</br></br></br>';
echo "<center>La b&uacute;squeda a arrojado: 0 resultados</center>";
}else{



@$consulta="SELECT * FROM `estudiante` WHERE `nome` like '%$cadena[1]%' and `apee` like '%$cadena[0]%'";
$resultado=mysql_query($consulta);
echo '</br></br></br></br>';
echo '<center><h2 class="form-signin-heading"><span lang="es">Resultados de la B&uacute;squeda ('.$total.' encontrados)</span></h2></br></br></center>';
   echo '<table width="80%" border="1" align="center">';
     echo '<th scope="col"><center>Cedula Escolar</center></th>';
         echo '<th scope="col"><center>Nombres Estudiante</center></th>';
         echo '<th scope="col"><center>Nombre representante</center></th>';
         echo '<th scope="col"><center>Telefono</center></th>';
		 echo '<th scope="col">Seccion</th>';
while($fila=mysql_fetch_assoc($resultado)){
$nom=$fila['nome'];
$apellidos=$fila['apee'];
$ced=$fila['ced_e'];

$consulta23="SELECT * FROM `representante` WHERE `ci_e` = '$ced'";
$resultado23=mysql_query($consulta23);
$fila23=mysql_fetch_assoc($resultado23);
$nomr=$fila23['nom'];
$aper=$fila23['ape'];
$tel=$fila23['tlf_rep'];

$consulta24="SELECT * FROM `secciones` WHERE `ce_e` = '$ced'";
$resultado24=mysql_query($consulta24);
$fila24=mysql_fetch_assoc($resultado24);
$seccion=$fila24['seccion'];

    echo '<p>';
	echo '<tr>';
  echo "<th scope='col'><center><a href=consulta_estudiante.php?cedulae=".$ced.">$ced</a></center></th>";
	echo "<th scope='col'><center>$nom $apellidos</center></th>";
	echo "<th scope='col'><center>$nomr $aper</center></th>";
	echo "<th scope='col'><center>$tel</center></th>";
	echo "<th scope='col'><center>$seccion</center></th>";

	echo '</tr>';
	echo "</p>";
}echo '</table>';

echo '</br></br>';
echo '<center>';
echo date("d-m-Y"); echo ' / '; echo date("H:i:s");
echo '</center>';
echo '<center></br></br></br><form><input type="button" value="Imprimir datos" onclick="window.print();return false;"/></form></center>';
}

}
else
{

@$consulta="SELECT * FROM `estudiante` WHERE `nome` like '%$cadena[0]%' and `apee` like '%$cadena[1]%'";

$resultado=mysql_query($consulta);
echo '</br></br></br></br>';
echo '<center><h2 class="form-signin-heading"><span lang="es">Resultados de la B&uacute;squeda ('.$total.' encontrados)</span></h2></br></br></center>';
   echo '<table width="80%" border="1" align="center">';
     echo '<th scope="col"><center>Cedula Escolar</center></th>';
         echo '<th scope="col"><center>Nombres Estudiante</center></th>';
         echo '<th scope="col"><center>Nombre representante</center></th>';
         echo '<th scope="col"><center>Telefono</center></th>';
		 echo '<th scope="col"><center>Seccion</center></th>';

while($fila=mysql_fetch_assoc($resultado)){
$nom=$fila['nome'];
$apellidos=$fila['apee'];
$ced=$fila['ced_e'];

$consulta23="SELECT * FROM `representante` WHERE `ci_e` = '$ced'";
$resultado23=mysql_query($consulta23);
$fila23=mysql_fetch_assoc($resultado23);
$nomr=$fila23['nom'];
$aper=$fila23['ape'];
$tel=$fila23['tlf_rep'];

$consulta24="SELECT * FROM `secciones` WHERE `ce_e` = '$ced'";
$resultado24=mysql_query($consulta24);
$fila24=mysql_fetch_assoc($resultado24);
$seccion=$fila24['seccion'];
    echo '<p>';
	echo '<tr>';
  echo "<th scope='col'><center><a href=consulta_estudiante.php?cedulae=".$ced.">$ced</a></center></th>";
	echo "<th scope='col'><center>$nom $apellidos</center></th>";
	echo "<th scope='col'><center>$nomr $aper</center></th>";
	echo "<th scope='col'><center>$tel</center></th>";
	echo "<th scope='col'><center>$seccion</center></th>";

	echo '</tr>';
	echo "</p>";
}echo '</table>';

echo '</br></br>';
echo '<center>';
echo date("d-m-Y"); echo ' / '; echo date("H:i:s");
echo '</center>';
echo '<center></br></br></br><form><input type="button" value="Imprimir datos" onclick="window.print();return false;"/></form></center>';
}
if($exito==0){
echo '<center></br></br>Problema al conectar con la Base de datos. Intenta mas tarde.</center></br></br>';}
?>
                          </div>    
    
<?php require('footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
