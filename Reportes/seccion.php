
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Consulta por secci&oacute;n</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
  


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<?php
require("../conexion.php");
$cons="SELECT DISTINCT seccion FROM secciones where seccion!='NT' and habil='Si' order by seccion";
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

   
<?php if($exito==0 && $b!=0){
echo '</br>';
echo '<form class="form-signin" id="form2" name="form2" method="get" action="listado.php">';
echo '<center><h2 class="form-signin-heading"><span lang="es">Selecciona una secci&oacute;n</span></br></br></h2></center>';
echo '<select name="seccion" class="form-control" required="required">';
while($datos=mysql_fetch_assoc($con)){
echo sprintf("<option>%s</option>",$datos['seccion']);
} 
echo '</select>';
echo '</br></br><button class="btn btn-lg btn-primary btn-block" type="submit">Ver registros</button>';
echo '</form>';}
else{
echo '<center></br></br>No hay alumnos asignados a alguna secci&oacute;n</center>';}
echo '</div>';
?>

</div></div>
<?php require('../footer.html') ?>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
