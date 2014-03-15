
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Cambio de Contraseña</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
     <link href="examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">
<?php
$cedula=$_GET['cedula'];
require("conexion.php");
$sql="SELECT habil FROM `usuario` where `cedula_usu`='$cedula'";
$result=mysql_query($sql);
$d=mysql_num_rows($result);
$wii=mysql_fetch_assoc($result);
if($wii){
if($wii['habil']=='No'){
$exito=1;
}else{
$exito=0;}
}
?>

<?php if($d!=0){
if($exito==0){
echo '<center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center></br></br>';
echo '<center>No estas deshabilitado</center>';
echo '<center></br></br> Ir a Inicio<input type="button" value="INICIO" onclick=(location: "login.php")"/></center>';}
if($exito==1){echo '<form class="form-signin" id="form2" name="form2" method="get" action="habilita.php">';
echo '<center><h2 class="form-signin-heading"><span lang="es">Ingresa tu nueva contraseña</span></h2></center>';
echo '<center>Por tu seguridad, cambia la contraseña de tu cuenta</center>';
$cedula; echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula);
echo '<input type="password" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" name="pass" id="pass" class="form-control" placeholder="Contraseña" required="required">';
echo '<input type="password" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" name="pass2" id="pass2" class="form-control" placeholder="Confirmar contraseña" required="required" oninput="check(this)"><br>';
echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Cambiar Contraseña</button>';
echo '</form>';}}
if($d==0){
echo '<center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center></br></br>';
echo '<center>No estas registrado</center>';
echo '<center></br></br> Ir a Inicio<input type="button" value="INICIO" onclick="(location: "login.php")"/></center>';
}?>

    </div> <!-- /container -->
    
    
<?php require('footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
