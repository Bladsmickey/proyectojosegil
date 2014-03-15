<?php
require("../conexion.php");
$cedula=$_GET['cedula'];
session_start();
$fecha=date("Y-m-d");
$datos="SELECT * FROM estudiante,egreso,institucion where estudiante.ced_e='$cedula' and egreso.ced_e='$cedula'";
$datosr=mysql_query($datos);
$resultado=mysql_fetch_assoc($datosr);
if($contador=mysql_num_rows($datosr)==0){
header("location: ../mal.php?retiro=1");
mysql_query("rollback");
}else{
mysql_query("COMMIT");
}
if($resultado['motivo']=='Null' && $resultado['inst_nueva']=='Null'){
header("location: ../mal.php?retiro=2");
mysql_query("rollback");
}else{
$nom=$resultado['nome'];
$ape=$resultado['apee'];
$cedula=$resultado['ced_e'];
$ced="C.I:";
$variable=$nom." ".$ape." ".$ced." ".$cedula;
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Genero constancia de retiro al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);
mysql_query("COMMIT");
}
$fecha2=explode("-",$resultado['fecha_nac']);
if($fecha2[1]==01){$mes="Enero";}
if($fecha2[1]==02){$mes="Febrero";}
if($fecha2[1]==03){$mes="Marzo";}
if($fecha2[1]==04){$mes="Abril";}
if($fecha2[1]==05){$mes="Mayo";}
if($fecha2[1]==06){$mes="Junio";}
if($fecha2[1]==07){$mes="Julio";}
if($fecha2[1]==08){$mes="Agosto";}
if($fecha2[1]==09){$mes="Septiembre";}
if($fecha2[1]==10){$mes="Octubre";}
if($fecha2[1]==11){$mes="Noviembre";}
if($fecha2[1]==12){$mes="Diciembre";}
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
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<TITLE>Constancia de Retiro</TITLE>

<link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
</HEAD>

<BODY><div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 nopadding">


<P class="text-center">Constancia de Retiro</P>
<P class="text-justify">Quien suscribe Director(e) <?php echo $nuevo2; ?> titular de la la Cédula de Identidad N° <?php echo $resultado['ced_dir']; ?>; Director(e) del <?php echo $resultado['nombre']; ?> que funciona en Valle de la pascua Edo. Guarico, hace constar que el alumno <?php echo $nuevo; ?> Titular de la Cédula de Identidad V-<?php echo $resultado['ced_e']; ?> Nacido el <?php echo $fecha2[2]; ?> de <?php echo $mes; ?> de <?php echo $fecha2[0]; ?> en la Ciudad de <?php echo $resultado['lugar_nac']; ?> <? echo $resultado['estado']; ?> fue retirado del plantel por el siguiente motivo <?php echo $resultado['motivo']; ?> en la escolaridad <?php echo date('Y'); ?> - <?php echo date('Y')+1; ?>. </P>


<P class="text-left">Constancia que se expide a petición de parte interesada en Valle de la pascua, a los <?php echo date("d"); ?> dias del mes de <?php echo $mesh; ?> del a&ntilde;o <?php echo date("Y"); ?>.</P>

<center>
<P>______________________</P>
<P>Firma y sello</P>
<P>Lcdo. <?php echo $resultado['nombre_dir']; ?></P>
<P >Director(e)</P>
</center></br>


<center>
<input name="Button1" type="button" value="Imprimir constancia" onclick="window.print()" class="btn btn-info oculto hidden-print" />
<input name="Button1" type="button" value="Regresar a la pagina anterior" onclick="history.back()" class="btn btn-info oculto hidden-print" />
</center>

</DIV>
<?php require("../footer.html"); ?>
</DIV>
</HTML>

