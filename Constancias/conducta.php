<?php
require('../conexion.php');
session_start();
$fecha=date("Y-m-d");
$cedula=$_GET['cedula'];
$datos="SELECT * FROM estudiante,secciones,institucion where estudiante.ced_e='$cedula' and secciones.ce_e='$cedula'";
$datosr=mysql_query($datos);
$resultado=mysql_fetch_array($datosr);
if($contador=mysql_num_rows($datosr)==0){
header("location: ../mal.php?retiro=1");
mysql_query("rollback");
}else{
$nom=$resultado['nome'];
$ape=$resultado['apee'];
$cedula=$resultado['ced_e'];
$ced="C.I:";
$variable=$nom." ".$ape." ".$ced." ".$cedula;
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Genero constancia de conducta al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);
mysql_query("COMMIT");
}
$fechah=date("m");
if($fechah==01){$mesh="Enero";}
if($fechah==02){$mesh="Febrero";}
if($fechah==03){$mesh="Marzo";}
if($fechah==04){$mesh="Abril";}
if($fechah==05){$mesh="Mayo";}
if($fechah==06){$mesh="Junio";}
if($fechah==07){$mesh="Julio";}
if($fechah==08){$mesh="Agosto";}
if($fechah==09){$mesh="Septiembre";}
if($fechah==10){$mesh="Octubre";}
if($fechah==11){$mesh="Noviembre";}
if($fechah==12){$mesh="Diciembre";}
$nuevo=strtoupper($resultado['nome']." ".$resultado['apee']);
$nuevo2=strtoupper($resultado['nombre_dir']);
if($resultado['mencion']=='Null'){
$menc="";
}else{
$menc="de"." ".$resultado['mencion'];
}
?>


<!DOCTYPE html5>
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<TITLE>Constancia de Buena Conducta</TITLE>
<link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">

<STYLE type="text/css">

</STYLE>

</HEAD>

<BODY>


	       <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 nopadding">



<P class="text-center">Constancia de Buena Conducta</P>
<P class="text-justify">Quien suscribe Director(e) <?php echo $nuevo2; ?> titular de la la Cédula de Identidad N° <?php echo $resultado['ced_dir']; ?>; Director(e) del <?php echo $resultado['nombre']; ?> que funciona en Valle de la pascua Edo. Guarico, hace constar que el alumno <?php echo $nuevo; ?> Titular de la Cédula de Identidad V-<?php echo $resultado['ced_e']; ?> cursó en la institución el <?php echo $resultado['anho_est']; ?> a&ntilde;o <?php echo $menc; ?>. Durante la escolaridad <?php echo date('Y'); ?> - <?php echo date('Y')+1; ?> se observó buena conducta.</P>

<center>
<P class="text-left">Constancia que se expide a petición de parte interesada en Valle de la pascua, a los <?php echo date("d"); ?> dias del mes de <?php echo $mesh; ?> del a&ntilde;o <?php echo date("Y"); ?>.</P>
<P>______________________</P>
<P>Firma y sello</P>
<P>Lcdo. <?php echo $resultado['nombre_dir']; ?></P>
<P >Director(e)</P>
</center>
<br>



<center>
<input name="Button1" type="button" value="Imprimir constancia" onclick="window.print()" class="btn btn-info oculto hidden-print" />

<input name="Button1" type="button" value="Regresar a la pagina anterior" onclick="history.back()" class="btn btn-info oculto hidden-print" />
</center>

</DIV>
<?php require("../footer.html"); ?>

</DIV>


</HTML>