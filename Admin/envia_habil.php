<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$fecha=date("Y-m-d");
session_start();
$act=ucwords(strtolower($_GET['actividad']));
$anho=date("Y");
@$desc=$_GET['desc'];
$cod=substr($act,0,4)."".$anho;
$con1="Select * from habilidad where tipo_hab like '$act'";
$con2=mysql_query($con1);
$con3=mysql_num_rows($con2);
$con11="Select * from habilidad where tipo_hab like '$act' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
if($con33!=0){
$con="Update habilidad set habil='Si' where tipo_hab = '$act'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego habilidad','$act','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?resul1=1");
mysql_query("COMMIT");
}else if($con3!=0){
header("location: ../bien.php?resul1=3");
}else{
$con="INSERT INTO habilidad VALUES ('Null','$act','$desc','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego habilidad','$act','$fecha')";
$consu=mysql_query($consulta);
if($conn && $consu){
header("location: ../bien.php?resul1=1");
mysql_query("COMMIT");
}
else{
header("location: ../bien.php?resul1=2");
mysql_query("rollback");
}}
?>