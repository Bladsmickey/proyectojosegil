
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Habilitar/Deshabilitar profesores</title>

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
     

      <div class="row marketing">
       
 <div class="col-lg-6">
        
       <?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select cedula_usu,nom_usu,ape_usu from `usuario` where habil='Si' and categoria='Profesor'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<legend><h4>Profesores habilitados</h4></legend>';
while($row=mysql_fetch_array($conss)){
$nomape=$row['nom_usu']." ".$row['ape_usu'];
$ced=$row['cedula_usu'];
echo '<form class="form-signin" id="form2" name="form2" method="post" action="deshabilita.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='profh[]' id='profh[]' type='checkbox' value='".$row["cedula_usu"]."'></td><td>Nombre: $nomape. C&eacute;dula: $ced</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Deshabilitar Profesores" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No exiten profesores habilitados </h4>';
mysql_query("rollback");}
?>    

</br>
                          </div>

        <div class="col-lg-6">
<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select cedula_usu,nom_usu,ape_usu from `usuario` where habil='No' and categoria='Profesor'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<legend><h4>Profesores Deshabilitados</h4></legend>';
while($row=mysql_fetch_array($conss)){
$nomape=$row['nom_usu']." ".$row['ape_usu'];
$ced=$row['cedula_usu'];
echo '<form class="form-signin" id="form2" name="form2" method="post" action="habilita.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='profd[]' id='profd[]' type='checkbox' value='".$row["cedula_usu"]."'></td><td>Nombre: $nomape. C&eacute;dula: $ced</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Habilitar Profesores" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No exiten profesores deshabilitados </h4>';
mysql_query("rollback");}
?> 
             </div>       
                 </div>
      </div>        
    
<?php require('../footer.html') ?>
    </div> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
