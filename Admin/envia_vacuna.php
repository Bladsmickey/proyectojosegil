<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$vac=ucwords(strtolower($_GET['vacuna']));
$tipo=$_GET['tipo'];
@$desc=ucwords(strtolower($_GET['descripcion']));
$fecha=date("Y-m-d");
session_start();
$anho=date("Y");
$con1="Select * from vacuna where nom_va like '$vac' and tipo_va='$tipo'";
$con2=mysql_query($con1);
$con3=mysql_num_rows($con2);
$con11="Select * from vacuna where nom_va like '$vac' and tipo_va='$tipo' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
if($con33!=0){
$con="Update vacuna set habil='Si' where nom_va = '$vac' and tipo_va='$tipo'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego vacuna','$vac','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result4=1");
mysql_query("COMMIT");
}else if($con3!=0){
header("location: ../bien.php?result4=3");
}else{
$con="INSERT INTO vacuna VALUES ('Null','$vac','$desc','$tipo','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego vacuna','$vac','$fecha')";
$consu=mysql_query($consulta);
if($conn){
header("location: ../bien.php?result4=1");
mysql_query("COMMIT");
}
else{
header("location: ../bien.php?result4=2");
mysql_query("rollback");
}}
?>