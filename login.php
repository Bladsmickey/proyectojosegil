
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

<h3><p class="text-center">Parece que no te has autenticado, te invitamos a hacerlo.</p></h3>
<br><br>

      <form class="form-horizontal" id="form1" name="form1" method="POST" action="autenticar.php">
  
<div class="form-group">
<label class="control-label col-md-3 col-sm-3">Nombre de usuario: </label>
<div class="col-md-9 col-sm-9"> 
  <div class="input-group">
<span class="input-group-addon glyphicon glyphicon-user"></span>
 <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" autofocus required="required"></div></div>
</div>
       
<div class="form-group">

<label class="control-label col-md-3 col-sm-3">Contraseña: </label>

<div class="col-md-9 col-sm-9">  
<div class="input-group">
<span class="input-group-addon glyphicon glyphicon-edit"></span>
  <input type="password" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required="required"></div>
</div></div>
      
<div class="form-group">
 <label class="control-label col-md-3 col-sm-3">Recordar</label>



<div class="col-md-9 col-sm-9">
       <input type="checkbox" value="recordar"> </div></div>


<div class="form-group">
  <div class="col-md-12 col-sm-12 text-center"><span>Si no recuerdas tus datos para ingresar al sistema dirigete <a href="recuperar.php">aqui </a></span></div>
</div>
 
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
