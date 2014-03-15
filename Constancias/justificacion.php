<?php
require('../conexion.php');
session_start();
$fecha=date("Y-m-d");
$cedula=$_GET['cedula'];
$datos="SELECT * FROM estudiante,secciones,representante,egreso where estudiante.ced_e='$cedula' and secciones.ce_e='$cedula' and representante.ci_e='$cedula' and egreso.ced_e='$cedula'";
$datosr=mysql_query($datos);
$resultado=mysql_fetch_array($datosr);
if($contador=mysql_num_rows($datosr)==0){
header("location: ../mal.php?just=1");
mysql_query("rollback");
}else{
mysql_query("COMMIT");
}
if($resultado['motivo']=='Null' && $resultado['inst_nueva']=='Null'){
header("location: mal.php?just=2");
mysql_query("rollback");
}else{
$nom=$resultado['nome'];
$ape=$resultado['apee'];
$cedula=$resultado['ced_e'];
$ced="C.I:";
$variable=$nom." ".$ape." ".$ced." ".$cedula;
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Genero justificacion de retiro al estudiante','$variable','$fecha')";
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
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<TITLE>Justificacion de Retiro</TITLE>

<link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
</HEAD>

<BODY>

	       <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 nopadding">

<P class="text-center">Justificacion de Retiro</P>
<P class="text-justify">Hoy <?php echo date("d"); ?> de <?php echo $mesh; ?> de <?php echo date("Y"); ?>, Yo, <?php echo $resultado['nom']; ?> <?php echo $resultado['ape']; ?> C.I Nº V-<?php echo $resultado['ci_r']; ?> Representante legal del estudiante <?php echo $resultado['nome']; ?> <?php echo $resultado['apee']; ?> C.I V-<?php echo $resultado['ced_e']; ?>, quien curso el <?php echo $resultado['anho_est']; ?> a&ntilde;o <?php echo $menc; ?> en la escolaridad <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?>, justifico su retiro del Plantel por el siguiente motivo <?php echo $resultado['motivo']; ?>.</P>

<P class="text-left">Mi representado sera inscrito en <?php echo $resultado['inst_nueva']; ?>.</P>
<P class="text-left">______________________</P>
<P class="text-left">Firma del representante</P>
<P class="text-left">Cedula de Identidad V-<?php echo $resultado['ci_r']; ?></P>
</br></br>
<P class="text-left">Recibido por: ________________________________</P>
<P class="text-left">Cedula de Identidad: ___________________________</P>
<P class="text-left">Firma: ___________________________</P></br></br>
<center>
<input name="Button1" type="button" value="Imprimir constancia" onclick="window.print()" class="btn btn-info oculto hidden-print" />

<input name="Button1" type="button" value="Regresar a la pagina anterior" onclick="history.back()" class="btn btn-info oculto hidden-print" />
</center>
</DIV>
<?php require("../footer.html"); ?>
</DIV>
</HTML>