
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Error</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
<?php
@$bueno=$_GET['bueno'];
@$no=$_GET['no_enviado'];
@$retirado=$_GET['retirado'];
@$ced=$_GET['cedula'];
@$reg=$_GET['registrado'];
@$asig=$_GET['asig'];
@$mod=$_GET['modificado'];
@$noe=$_GET['noenviado'];
@$uno=$_GET['retiro'];
@$dos=$_GET['just'];
@$r=$_GET['r'];
@$ins=$_GET['inscrito'];
@$ins2=$_GET['noinscrito'];
@$resta=$_GET['rest'];
?>
  <body>



     <div class="container">
     
<?php require('header.php'); ?>

<div class="col-md-9">

    <?php if($bueno==2):?>
     <div class="alert alert-warning">
     <center><h2>Ups!</h2></center>

    <center><p class="form-signin">
    Error: No estas registrado. Si llenastes mal el formulario intentalo de nuevo
  <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
  <br><br>Ya existe una cuenta con ese Id.</p></center>
</div>

    <?php endif; ?>

<?php if($bueno==3):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No estas registrado. Si llenastes mal el formulario intentalo de nuevo  <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
  </br></br>Posiblemente ya estas registrado.</p></center></div>

    <?php endif; ?>

<?php if($resta==2):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: la restauracion de la base de datos no se ha realizado. Verifica si el archivo esta relacionado con el respaldado. 

    <?php endif; ?>

<?php if($ins==1):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: el alumno que intentas inscribir esta inscrito, si fue retirado e intentas reintegrarlo dirigete al menu 'Gestion' y haz click sobre reintegrar.
  </br></br>O si deseas dirigete a reintegrar <a href="reintegra.php">aqui</a>.</p></center></div>

    <?php endif; ?>

<?php if($ins2==1):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: el alumno que intentas reinscribir no esta inscrito. O si deseas inscribirlo dirigete a <a href="menuins.php">aqui</a>.</p></center></div>

    <?php endif; ?>
    
<?php if($r==1):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro realizar la restauracion de la Base de datos. Si deseas intentalo de nuevo presionando <a href="seguridad.php">aqui </a>.

    <?php endif; ?>    
    
<?php if($bueno==4):?>
     <div class="alert alert-warning">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No estas registrado. Si llenastes mal el formulario intentalo de nuevo  <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
  </br></br>Intentalo mas tarde.</p></center></div>

    <?php endif; ?>


   <?php if($no==1):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la actividad. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
    
    <?php if($no==2):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la vacuna. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
   <?php if($no==3):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la diversidad. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
    
       <?php if($no==4):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la enfermedad. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
    
           <?php if($retirado==4):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro retirar al estudiante. Posiblemente no exista un registro relacionado con esa c&eacute;dula. Intentalo mas tarde <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>

          <?php if($asig==6):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se lograron asignar los datos. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>


     <?php if($mod==2):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro actualizar los datos. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>

    
       <?php if($noe==2):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la seccion. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>

     <?php if($noe==1):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se logro eliminar la materia. Intentalo mas tarde. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>

    
      <?php if($uno==1):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se puede mostrar la constancia pues no existe un registro con ese numero de cedula. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
          <?php if($uno==2):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se puede mostrar la constancia pues no se ha establecido el motivo e institucion nueva. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>

        <?php if($dos==1):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se puede mostrar la justificacion pues no existe un registro con ese numero de cedula. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
    
    
         <?php if($dos==2):?>
     <div class="alert alert-danger">
     <center><h2 class="form-signin-heading"><span lang="es">Ups!</span></h2></center>

   <center><p class="form-signin">Error: No se puede mostrar la justificacion pues no se ha establecido el motivo e institucion nueva. <a href="javascript:history.back();" class="alert-link">Reintentar.</a>
</p></center> </div>

    <?php endif; ?>
</div>

    <?php require('footer.html') ?>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

