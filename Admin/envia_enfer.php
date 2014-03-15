<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$fecha=date("Y-m-d");
session_start();
$enf=ucwords(strtolower($_GET['enfer']));
@$desc=$_GET['descripcion'];
$anho=date("Y");
$cod=substr($enf,0,4)."".$anho;
$con1="Select * from enfermedad where tipo_enf like '$enf'";
$con2=mysql_query($con1);
$con3=mysql_num_rows($con2);
$con11="Select * from enfermedad where tipo_enf like '$enf' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
if($con33!=0){
$con="Update enfermedad set habil='Si' where tipo_enf = '$enf'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego enfermedad','$enf','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result3=1");
mysql_query("COMMIT");
}else if($con3!=0){
header("location: ../bien.php?result3=3");
}else{
$con="INSERT INTO enfermedad VALUES ('Null','$enf','$desc','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego enfermedad','$enf','$fecha')";
$consu=mysql_query($consulta);
if($conn && $consu){
header("location: ../bien.php?result3=1");
mysql_query("COMMIT");	
}
else{
header("location: ../bien.php?result3=2");
mysql_query("rollback");
}}
?>

