
<?php
$fecha=date("Y-m-d");
session_start();
$cedula=$_GET['cedulae'];
$motivo=$_GET['motivo'];
$inst=$_GET['inst_nva'];
$fecha=date("Y-m-d");
require("../conexion.php");
$cn="Select ced_e,nome,apee from estudiante where ced_e='$cedula'";
$cnn=mysql_query($cn);
$cnnn=mysql_num_rows($cnn);
$extra=mysql_fetch_assoc($cnn);
$nombre=$extra['nome'];
$apellido=$extra['apee'];
$cedula=$extra['ced_e'];
$ced="C.I:";
$variable=$nombre." ".$apellido." ".$ced." ".$cedula;
if($cnnn==0){
header("location: mal.php?retirado=4");
}else{
$cons="Select condicion from estudiante where ced_e='$cedula'";
$conss=mysql_query($cons);
$c=mysql_fetch_assoc($conss);
if($c['condicion']=="Retirado"){
header("location: mal.php?retirado=4");
}else{
$sql="UPDATE `estudiante` set condicion='Retirado' WHERE `ced_e`='$cedula'";
$result = mysql_query($sql);
$sqll="Update `secciones` set habil='No' where ce_e='$cedula'";
$resultt=mysql_query($sqll);
$consex="Select * from egreso where ced_e = '$cedula'";
$eval=mysql_query($consex);
if($e=mysql_num_rows($eval)==0){
$sqlll="Insert into `egreso` values ('$cedula','$motivo','$fecha','$inst')";
$resulttt=mysql_query($sqlll);
}else{
$sqlll="Update `egreso` set motivo='$motivo',fecha_egreso='$fecha',inst_nueva='$inst' where ced_e='$cedula'";
$resulttt=mysql_query($sqlll);
}
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Retiro estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);
if($result && $resultt && $resulttt && $consu){
header("location: ../bien.php?retirado=3");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?retirado=4");
}}}
?>