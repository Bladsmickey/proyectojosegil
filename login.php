
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  
<?php
@$error=$_GET['error'];

?>
  </head>

  <body>
      <div class="container">
   <?php require('header.php'); ?>
    <div class="col-xs-8 well nopadding">

      <form class="form-group" id="form1" name="form1" method="POST" action="autenticar.php">
        <h3>Parece que no te has autenticado, te invitamos a hacerlo.</h3>


        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" autofocus required="required">
        <input type="password" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required="required">

        <label class="checkbox">
          <input type="checkbox" value="recordar">Recordar</label>

 <span>Si no recuerdas tus datos para ingresar al sistema dirigete <a href="recuperar.php">aqui </a></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Autenticar</button>
      </form>   
    <?php if(@$error==1){echo '<center><div class="text-center alert alert-warning">Usuario o contraseña incorrectos</div></center>';}?>
    <?php if(@$error==2){echo '<center><div class="text-center alert alert-info">Completa los datos solicitados para entrar</div></center>';}?>
    <?php if(@$error==3){echo '<center><div class="text-center alert alert-danger">Lo sentimos, este usuario no esta habilitado, hable con su coordinador para ser habilitado</div></center>';}?>
    </div> <!-- /container -->
 
</div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
