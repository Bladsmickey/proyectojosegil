<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Actualizar cabecera</title>
<?php
$char=0;
@$char=$_GET['exito'];
?>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <link href="../dist/css/jquery.fileupload.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

<div class="container">

<?php require('../header.php'); ?>


  <div class="col-md-8 well nopadding text-justify">

       <center><h2>Cambio de cabecera</h2></center>


<p>Para cambiar la cabecera, seleccione la imagen y confirme el cambio</p>
<p class="text-center">Cabecera actual:</p><p class="text-center"> <img src="../imagenes/logoo.jpg" width="500" height="50"></p>


<p class="text-center">Cabecera nueva:</p> <p class="text-center"><div id="files" class="files"></div></p>

<form method="post" action="subirimg.php" enctype="multipart/form-data">
  <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Subir...</span>
        <input id="file" type="file" name="file">
      </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <?php if($char==1): ?>

<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Cabecera</strong> Cambiada con exito, por favor cierra y abra el navegador para notar los cambios.
</div>

    <?php endif; ?>
    
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Nota</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>La resolucion optima de la cabecera es <strong>1000 x 100p</strong>.</li>
                <li>Solo se aceptan imagenes (<strong>JPG, GIF, PNG</strong>)</li>
                <li>La cabecera anterior sera <strong>Eliminada</strong></li>
                <li>Puedes <strong>Arrastrar y soltar</strong> Los archivos a esta pagina </li>
            </ul>
        </div>
    </div>


<p class="text-center"><button type="submit" name="submit" value="submit" class="btn btn-success">Confirmar cambio</button></p>
</form>

     </div>
          </div>
               </div>


 <?php require('../footer.html') ?>    
   </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
