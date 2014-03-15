<?php
$fecha=date("Y-m-d");
session_start();
$cedula=$_GET['cedulae'];
$anho=$_GET['vacu'];
@$mencion=$_GET['menc'];
$seccion=$_GET['seccion'];
require("../conexion.php"); 
$cn="Select * from estudiante where ced_e='$cedula' and condicion='Repitiente'";
$cnn=mysql_query($cn);
$cnnn=mysql_num_rows($cnn);
$extra=mysql_fetch_assoc($cnn);
$nombre=$extra['nome'];
$apellido=$extra['apee'];
$cedula=$extra['ced_e'];
$var1="a la seccion";
$var2="mencion";
$var3="a&ntilde;o";
$ced="C.I:";
if(isset($_GET['menc'])){
$variable=$nombre." ".$apellido." ".$ced." ".$cedula." ".$var1." ".$seccion." ".$var2." ".$mencion." ".$var3." ".$anho;
}else{
$variable=$nombre." ".$apellido." ".$ced." ".$cedula." ".$var1." ".$seccion." ".$var3." ".$anho;
}
if($cnnn==0){
header("location: ../mal.php?asig=6");
}else{
$cons="Select condicion from estudiante where ced_e='$cedula'";
$conss=mysql_query($cons);
$c=mysql_fetch_assoc($conss);
if($c['condicion']!="Repitiente"){
header("location: ../mal.php?asig=6");
}else if(isset($_GET['menc'])){
$con2="Update secciones set anho_est = '$anho', mencion = '$mencion', seccion = '$seccion', habil = 'Si' where ce_e = '$cedula'";
$conn2=mysql_query($con2);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Asigno al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
$con2="Update secciones set anho_est = '$anho', mencion = 'Null', seccion = '$seccion', habil = 'Si' where ce_e = '$cedula'";
$conn2=mysql_query($con2);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Asigno al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);
if($conn2 && $consu){
header("location: ../bien.php?asig=5");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?asig=6");
}}}
?>