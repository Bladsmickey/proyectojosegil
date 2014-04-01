
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
      <form class="form-horizontal" id="form2" name="form2" method="get" action="recupera.php">

        <h2><p class="text-center">Completa los campos a continuacion</p></h2></br>

<p class="text-center">Luego se le enviara un correo con sus datos de ingreso!</p>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3">Correo electronico: </label>
<div class="input-group col-md-9 col-sm-9">
  <span class="input-group-addon">@</span>
<input type="email" name="correo" class="form-control" placeholder="Ejemplo@ejemplo.com" required="required">
</div></div>



<div class="form-group">
<label for="" class="control-label col-md-3 col-sm-3">C.I.N.V: </label>

<div class="input-group col-md-9 col-sm-9">
  <span class="input-group-addon">Nº</span>
 <input type="text" pattern="\d*" name="cedula" class="form-control" placeholder="99999999" maxlength="8" required="required"><br>
       </div>

       </div> 


       <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar correo</button>
      </form>

    </div> <!-- /container -->
    
    
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
