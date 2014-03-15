
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Movimientos en el sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<?php
require("../conexion.php");
$cons="SELECT * FROM usuario order by usuario";
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
      <form class="form-signin" id="form2" name="form2" method="get" action="usuario_enviar.php">
        <center><h2 class="form-signin-heading"><span lang="es">Selecciona el usuario</span></h2></center></br></br>
  <div class="form-group">
<?php if($exito==0 && $b!=0){
echo '<label for="Select4"></label>';
echo '<select name="usuario" class="form-control" required="required">';
echo '<option value="">Usuario</option>';
while($datos=mysql_fetch_assoc($con)){
echo sprintf("<option>%s</option>",$datos['usuario']);
}
echo '</select>';}
?>
</br></div><button class="btn btn-lg btn-primary btn-block" type="submit">Ver movimientos</button>
            </form>

    </div> <!-- /container -->
    
    
<?php require('../footer.html') ?>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
