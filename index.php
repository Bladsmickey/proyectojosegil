<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Inicio</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

<div class="container">

<?php require('header.php'); ?>


  <div class="col-md-8 well nopadding text-justify">

       <center><?php echo "Bienvenid@"." ".$_SESSION['usuario']; ?></center>

<p>Bienvenidos al sistema de inscripcion, este sistema se creo con la finalidad de que el proceso de inscripcion resulte más intuitivo, eficiente y útil</p>
<p><img src="src/filing_cabinet-g42.png" alt="lolo" width="42" height="42" />Gestion de alumnos, Permite inscribir, actualizar e imprimir datos referentess a los alumnos.</p>
<p><img src="src/nosign-r42.png" alt="lili" width="42" height="42" />Menos papelo, el utilizar este sistema, hace que el papeleo se reduzca drasticamente.</p>
<p><img src="src/mobile_phone-42.gif" alt="lulu" width="42" height="42" />Informacion personal, permite registrar los datos de padres y representante para contactarlos rapidamente.    </p>
<p class="text-center">Para continuar seleccione una de las opciones arriba.</p>


     </div>
          </div>
               </div>


 <?php require('footer.html') ?>    
   </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
