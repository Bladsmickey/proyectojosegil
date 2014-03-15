<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Actualizar director</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<?php
@session_start();
require('../conexion.php');
$datos="SELECT * FROM institucion WHERE id=0";
$datos2=mysql_query($datos);
$datos3=mysql_fetch_assoc($datos2);
$fecha=date("Y-m-d");
$nombre=$datos3['nombres'];
$apellido=$datos3['apellidos'];
$cedular=$datos3['ced_dir'];
$telefon=$datos3['telefono'];
$direccione=$datos3['direccion'];
$usuario=$_SESSION['usuario'];

if(isset($_POST['submit'])){
$nombres=$_POST['nombre'];
$apellidos=$_POST['apellido'];
$cedula=$_POST['nac']."".$_POST['cedula'];
$telefono=$_POST['codigo'].'-'.$_POST['telefono'];
$direccion=$_POST['direccion'];
$consulta = "UPDATE institucion SET nombres = '$nombres', apellidos = '$apellidos', telefono= '$telefono', direccion = '$direccion', ced_dir = '$cedula' WHERE 'id' = 0";
$hola=mysql_query($consulta);

$consulta="Insert into accion values ('$usuario','Edito director','$nombres $apellidos','$fecha')";
$consu=mysql_query($consulta);

if($hola and $consu){mysql_query('COMMIT');
header('location: ../admin/actualizar_director.php?exito=1');
}
else{mysql_query('ROLLBACK');
header('location: ../admin/actualizar_director.php?exito=2');
}


}
@$exito=$_GET['exito'];
?>
  </head>

  <body>

<div class="container">

<?php require('../header.php');$usuario=$_SESSION['usuario']; ?>



  <div class="col-md-8 well">
    <div class="col-lg-4 col-sm-4">
      <legend><h2>Directivo actual</h2></legend>
<h4 style="font-family: Arial;">
<address>
  <strong><?php echo $nombre." ".$apellido;  ?></strong><br>
  <?php echo $cedular; ?><br>
  <?php echo $direccione ?><br>
  <abbr title="Telefono">P:</abbr> <?php echo $telefon; ?>
</address></h4>


    </div>


<div class="col-lg-8 col-sm-8">
<legend><center><h2>Actualizacion de directivo</h2></center></legend>


<p>Para actualizar, complete los datos a continuacion:</p>
<form action="../admin/actualizar_director.php" method="POST" class="form-horizontal">
<div class="col-lg-2 col-sm-2"><label for="nombre" class="control-label">Nombres</label></div>
<div class="col-lg-4 col-sm-4"><input type="text" name="nombre" id="nombre" class="form-control"></div>

<div class="col-lg-2 col-sm-2"><label for="apellido" class="control-label">Apellidos</label></div>
<div class="col-lg-4 col-sm-4"><input type="text" name="apellido" id="apellido" class="form-control"></div>
<br><br>
<div class="col-lg-2 col-sm-2"><label for="cedula" class="control-label">C.I.N.V: </label></div>
<div class="col-lg-4 col-sm-4"><select name="nac" id="nac" class="form-control"><option value="E-">E-</option><option value="V-">V-</option></select></div>
<div class="col-lg-6 col-sm-6"><input type="text" name="cedula" id="cedula" class="form-control"></div>
<br><br>

<div class="col-lg-2 col-sm-2"><label for="telefono" class="control-label">Telefono: </label></div>
<div class="col-lg-4 col-sm-4"><select name="codigo" id="codigo" class="form-control">
  <option>0424</option>
  <option>0414</option>
  <option>0426</option>
  <option>0416</option>
  <option>0412</option>
  <option>0235</option>
  </select></div>
<div class="col-lg-6 col-sm-6"><input type="text" name="telefono" id="telefono" class="form-control"></div>

<br><br>

<div class="col-lg-2 col-sm-2"><label for="telefono" class="control-label">Direccion: </label></div>
<div class="col-lg-10 col-sm-10"><input type="text" name="direccion" id="direccion" class="form-control"></div>

<br><br>
<p class="text-center"><button type="submit" id="submit" name="submit" class="btn btn-success">Actualizar</button><button class="btn btn-info">Cancelar</button>
</p>
</form>


     </div>
<div class="col-lg-12">
<?php if($exito==1): ?>

<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Director</strong> Actualizado, notara los cambios en los textos emitidos proximos.
</div>

    <?php endif; ?>

<?php if($exito==2): ?>

<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Director</strong> No actualizado.
  , por favor intentelo luego.
</div>

    <?php endif; ?>
</div>
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
