<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$div=ucwords(strtolower($_GET['div']));
$tipo=$_GET['tipo'];
$fecha=date("Y-m-d");
session_start();
$anho=date("Y");
@$desc=$_GET['desc'];
$con1="Select * from diversidad_fun where nom_div like '$div' and tipo_div = '$tipo'";
$con2=mysql_query($con1);
$con3=mysql_num_rows($con2);
$con11="Select * from diversidad_fun where nom_div like '$div' and tipo_div = '$tipo' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
if($con33!=0){
$con="Update diversidad_fun set habil='Si' where nom_div = '$div' and tipo_div = '$tipo'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego diversidad','$div','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?resul2=1");
mysql_query("COMMIT");
}else if($con3!=0){
header("location: ../bien.php?resul2=3");
}else{
$con="INSERT INTO diversidad_fun VALUES ('Null','$tipo','$div','$desc','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego diversidad','$div','$fecha')";
$consu=mysql_query($consulta);
if($conn && $consu){
header("location: ../bien.php?resul2=1");
mysql_query("COMMIT");
}
else{
header("location: ../bien.php?resul2=2");
mysql_query("rollback");
}}
?>