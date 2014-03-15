
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Sistema de Inscripcion</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
<?php 
@$buen1=$_GET['cs'];
@$buen2=$_GET['p'];
@$retirado=$_GET['retirado'];
@$rein=$_GET['reintegrado'];
@$asig=$_GET['asig'];
@$var1=$_GET['resul1'];
@$var2=$_GET['resul2'];
@$var3=$_GET['result1'];
@$var4=$_GET['result2'];
@$var5=$_GET['result3'];
@$var6=$_GET['result4'];
?>
  <body>
<div class="container">
  <?php require('header.php'); ?>
    <div class="col-xs-8 nopadding">  
<form>

    <?php if($buen1==2){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Registro exitoso, ahora puedes realizar los cambios respectivos a tu nivel de Usuario. Puedes seleccionar una opcion en el menu para realizar el respectivo control de estudiantes, por ejemplo si deseas generar un reporte dirigete al menu "Reportes".</br></br>En caso de que desees realizar la creacion de otra cuenta dirigete <a href="../admin/registro.php">aqui </a>.</div></center>';}?>
    
    <?php if($buen2==2){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Registro exitoso, ahora puedes realizar los cambios respectivos a tu nivel de Usuario. Puedes seleccionar una opcion en el menu para realizar el respectivo control de estudiantes, por ejemplo si deseas generar un reporte dirigete al menu "Reportes".</br></br>En caso de que desees realizar la creacion de otra cuenta dirigete <a href="../admin/registroo.php">aqui </a>.</div></center>';}?>
    
    <?php if($retirado==3){echo '<center><div class="text-justify alert alert-success"> <center><h2><span lang="es">Enhorabuena!</span></h2></center>Retirado con exito del liceo. Recuerda entregar los reportes correspondientes en el menu "Constancias".</div></center>';}?>
    
    <?php if(isset($rein)){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Asignados datos con exito al estudiante.</div></center>';}?>
    
    <?php if($asig==5){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Asignado con exito a la seccion, puedes realizar el respectivo control del estudiante mediante el menu, por ejemplo si deseas generar una constancia de buena conducta dirigete al menu "Constancias".</div></center>';}?>
    
    <?php if($var1==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Habilidad registrada con exito! Si deseas agregar otra dirigete <a href="../admin/agregar_actividades.php">aqui </a>.</div></center>';}?>
    
    <?php if($var1==2){echo '<center><div class="text-justify alert alert-info"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registar la habilidad. Intenta mas tarde. Si deseas agregar otra dirigete <a href="../admin/agregar_actividades.php">aqui </a>.</div></center>';}?>
    
    <?php if($var1==3){echo '<center><div class="text-justify alert alert-danger"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registar la habilidad. Ya existe una con ese nombre. Si deseas agregar otra dirigete <a href="../admin/agregar_actividades.php">aqui </a>.</div></center>';}?>
    
    <?php if($var2==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Diversidad registrada con exito! Si deseas agregar otra dirigete <a href="../admin/agregar_diversidad.php">aqui </a>.</div></center>';}?>
    
    <?php if($var2==2){echo '<center><div class="text-justify alert alert-info"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registar la Diversidad. Intenta mas tarde. Si deseas agregar otra dirigete <a href="../admin/agregar_diversidad.php">aqui </a>.</div></center>';}?>
    
    <?php if($var2==3){echo '<center><div class="text-justify alert alert-danger"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registrar la Diversidad. Ya existe una con ese nombre. Si deseas agregar otra dirigete <a href="../admin/agregar_diversidad.php">aqui </a>.</div></center>';}?>
    
    <?php if($var3==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Materia registrada con exito! Si deseas agregar otra dirigete <a href="../admin/agregar_materia.php">aqui </a>.</div></center>';}?>
    
    <?php if($var3==2){echo '<center><div class="text-justify alert alert-info"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registrar la materia.  Si deseas agregar otra dirigete <a href="../admin/agregar_materia.php">aqui </a>.</div></center>';}?>
   
    <?php if($var4==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Seccion creada con exito!  Si deseas agregar otra dirigete <a href="../admin/agregar_seccion.php">aqui </a>.</div></center>';}?>
   
    <?php if($var4==2){echo '<center><div class="text-justify alert alert-danger"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro crear la seccion, posiblemente ya este creada.  Si deseas agregar otra dirigete <a href="../admin/agregar_seccion.php">aqui </a>.</div></center>';}?>
   
    <?php if($var5==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Enfermedad registrada con exito! Si deseas agregar otra dirigete <a href="../admin/Habenfermedades.php">aqui </a>.</div></center>';}?>
   
    <?php if($var5==2){echo '<center><div class="text-justify alert alert-info"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registrar la enfermedad. Intenta mas tarde.</div></center>';}?>
   
    <?php if($var5==3){echo '<center><div class="text-justify alert alert-danger"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registar la enfermedad. Ya existe una con ese nombre. Si deseas agregar otra dirigete <a href="../admin/Habenfermedades.php">aqui </a>.</div></center>';}?>
   
    <?php if($var6==1){echo '<center><div class="text-justify alert alert-success"><center><h2><span lang="es">Enhorabuena!</span></h2></center>Vacuna registrada con exito! Si deseas agregar otra dirigete <a href="../Admin/Habvacunas.php">aqui </a>.</div></center>';}?>
   
    <?php if($var6==2){echo '<center><div class="text-justify alert alert-info"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registar la vacuna. Intenta mas tarde. Si deseas agregar otra dirigete <a href="../admin/Habvacunas.php">aqui </a>.</div></center>';}?>
   
    <?php if($var6==3){echo '<center><div class="text-justify alert alert-danger"><center><h2><span lang="es">Lo sentimos!</span></h2></center>No se logro registrar la vacuna. Ya existe una con ese nombre. Si deseas agregar otra dirigete <a href="../admin/Habvacunas.php">aqui </a>.</div></center>';}?>
      </form>
     <!-- /container -->
     </div>
<?php require('footer.html') ?>

</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
