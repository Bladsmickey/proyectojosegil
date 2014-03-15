<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$fecha=date("Y-m-d");
session_start();
$seccion=ucwords(strtolower($_GET['seccion']));
$ano=$_GET['ano'];
@$mencion=$_GET['mencion'];
$anho=date("Y");
$var2="mencion";
if(isset($_GET['mencion'])){
$variable=$seccion." ".mencion." ".$mencion." ".de." ".$ano;
}else{
$variable=$seccion." ".de." ".$ano;
}
if(isset($_GET['mencion'])){
$con11="Select * from materia where nom_mat like '$seccion' and ano_mat='$ano' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
}else{
$con11="Select * from materia where nom_mat like '$seccion' and ano_mat='$ano' and habil='No'";
$con22=mysql_query($con11);
$con33=mysql_num_rows($con22);
}
if(isset($_GET['mencion'])){
$c="Select * from materia where nom_mat='$seccion' and ano_mat='$ano' and mencion='$mencion'";
$d=mysql_query($c);
if($con33!=0){
$con="Update materia set habil='Si' nom_mat='$seccion' and ano_mat='$ano' and mencion='$mencion'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego materia','$variable','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result1=1");
mysql_query("COMMIT");
}else if($p=mysql_num_rows($d)==0){
$con="INSERT INTO materia VALUES ('Null','$seccion','$ano','$mencion','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego materia','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
header("location: ../bien.php?result1=1");
mysql_query("rollback");
}}else{
$c="Select * from materia where nom_mat='$seccion' and ano_mat='$ano'";
$d=mysql_query($c);
if($con33!=0){
$con="Update materia set habil='Si' where `nom_mat`='$seccion' and `ano_mat`='$ano'";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego materia','$variable','$fecha')";
$consu=mysql_query($consulta);
header("location: ../bien.php?result1=1");
mysql_query("COMMIT");
}else if($p=mysql_num_rows($d)==0){
$con="INSERT INTO materia VALUES ('Null','$seccion','$ano','Null','Si')";
$conn=mysql_query($con);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Agrego materia','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
header("location: ../bien.php?result1=2");
mysql_query("rollback");
}}
if($conn && $consu){
header("location: ../bien.php?result1=1");
mysql_query("COMMIT");
}
else{
header("location: ../bien.php?result1=2");
mysql_query("rollback");
}
?>