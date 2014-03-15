
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Recuperacion de Usuario/Contraseña</title>

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

<script language="JavaScript" type="text/JavaScript">
function check(input) {
if (input.value != document.getElementById('pass').value) {
        input.setCustomValidity('Contraseñas no coinciden.');
    } else {
        input.setCustomValidity('');
    }
  }
</script>

  </head>

<?php
$para=$_GET['correo'];
$cedula=$_GET['cedula'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$sql="select nom_usu,ape_usu,usuario,cont_usu from usuario where cedula_usu='$cedula' and correo='$para'";
$sqll=mysql_query($sql);
if($sqll){
mysql_query("COMMIT");
$wii=mysql_fetch_assoc($sqll);
$nom=$wii['nom_usu'];
$ape=$wii['ape_usu'];
$usu=$wii['usuario'];
$con=$wii['cont_usu'];
$asunto    = 'Contrase&ntilde;a y Usuario del Sistema de Inscripcion';
$mensaje   = "Hola ".$nom." ".$ape.". Tu usuario es: ".$usu." y tu contraseña: ".$con."";
$cabeceras = 'From: remitente@dominio.com' . "\r\n" .
             'Reply-To: remitente@dominio.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
  
if(mail($para, $asunto, $mensaje, $cabeceras)) {
$exito=1;
}else {
$exito=0;
}}
else{
mysql_query("rollback");
header("location: mal.php?bueno=5");}
?>
  <body>
    <div class="container">
<?php
if($exito==1){
echo '</br></br>';
echo '<form class="form-signin">';
echo '<center><h2 class="form-signin-heading"><span lang="es">Envio Exitoso!</span></h2></br></center>';
echo '<center>Revisa la bandeja de tu correo electronico!</br></br> Espera unos segundos y seras redireccionado a inicio. <script language="JavaScript" type="text/javascript"> var pagina="login.php" function redireccionar() { location.href=pagina } setTimeout ("redireccionar()", 20000); </script></center>';
echo '</form>';}else{
echo '<form class="form-signin">';
echo '<center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></br></center>';
echo '<center>Ocurrio un error y no pudieron ser enviados los datos a tu correo. Intentalo mas tarde!</center>';
echo '<center>El error puede haber ocurrido por una conexion fallida de internet.</center>';}?>


    </div> <!-- /container -->
    
    
<?php require('footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
