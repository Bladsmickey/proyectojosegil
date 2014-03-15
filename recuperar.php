
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Recuperacion de Usuario/Contraseña</title>

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
   <?php require('header.php'); ?>
    <div class="col-xs-8 well nopadding">
      <form class="form-signin" id="form2" name="form2" method="get" action="recupera.php">
        <h2 class="form-signin-heading"><span lang="es">Completa los campos a continuacion</span></h2></br>
<center>Luego se le enviara un correo con sus datos de ingreso!</center>
<input type="text" name="correo" class="form-control" placeholder="Correo Electrónico"required="required"></br>
 <input type="text" pattern="\d*" name="cedula" class="form-control" placeholder="Cedula (solo numeros)" maxlength="8" required="required"><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar correo</button>
      </form>

    </div> <!-- /container -->
    
    
<?php require('footer.html') ?>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
