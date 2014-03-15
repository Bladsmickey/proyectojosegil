
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Movimiento en el sistema</title>

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
      
      <form class="form-signin" id="form2" name="form2" method="get" action="fecha_enviar.php">
        <center><h2 class="form-signin-heading"><span lang="es">Escoge una fecha</span></h2></center>
  <div class="form-group">
</br></br><input type="date" name="fecha_re" id="fecha_re" class="form-control" required title="Utiliza una fecha valida. Ej: 21/05/2013">
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
