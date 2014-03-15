<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$fecha=date("Y-m-d");
session_start();
$seccion=strtoupper($_GET['seccion']);
$ano=$_GET['ano'];
@$mencion=$_GET['mencion'];
if(isset($_GET['mencion'])){
$variable=$seccion." ".mencion." ".$mencion." ".de." ".$ano;
}else{
$variable=$seccion." ".de." ".$ano;
}
if(isset($_GET['mencion'])){
$con11="Select * from seccion_cont where seccion='$seccion' and ano='$ano' and mencion='$mencion' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
$c="Select * from seccion_cont where seccion='$seccion' and ano='$ano' and mencion='$mencion'";
$d=mysql_query($c);
}else{
$con11="Select * from seccion_cont where seccion='$seccion' and ano='$ano' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
$c="Select * from seccion_cont where seccion='$seccion' and ano='$ano'";
$d=mysql_query($c);
}
if(isset($_GET['mencion'])){
if($con33!=0){
$con="Update seccion_cont set habil='Si' where seccion='$seccion' and ano='$ano' and mencion='$mencion'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego seccion','$variable','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result2=1");
mysql_query("COMMIT");
}else if($p=mysql_num_rows($d)==0){
$con="INSERT INTO seccion_cont VALUES ('Null','$seccion','$ano','$mencion','0','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego seccion','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
header("location: ../bien.php?result2=2");
mysql_query("rollback");
}
}else{
if($con33!=0){
$con="Update seccion_cont set habil='Si' where seccion='$seccion' and ano='$ano'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego seccion','$variable','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result2=1");
mysql_query("COMMIT");
}else if($p=mysql_num_rows($d)==0){
$con="INSERT INTO seccion_cont VALUES ('Null','$seccion','$ano','Null','0','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego seccion','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
header("location: ../bien.php?result2=2");
mysql_query("rollback");
}
}
if($conn && $consu){
header("location: ../bien.php?result2=1");
mysql_query("COMMIT");
}
else{
header("location: ../bien.php?result2=2");
mysql_query("rollback");
}
?>