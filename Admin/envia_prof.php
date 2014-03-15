<?php

function encriptar($password, $digito = 7) {
$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$salt = sprintf('$2a$%02d$', $digito);
for($i = 0; $i < 22; $i++)
{
    $salt .= $set_salt[mt_rand(0, 63)];
}
return crypt($password, $salt);
}

$nombre=ucwords(strtolower($_GET['nombre']));
$apellido=ucwords(strtolower($_GET['apellido']));
$cedula=$_GET['cedula'];
$direc=ucwords(strtolower($_GET['direcc']));
$telef=$_GET['telef'];
$usuario=$_GET['usuarioo'];
$fecha=date("Y-m-d");
$pass=encriptar($cedula);

$ced="C.I:";
$variable=$nombre." ".$apellido." ".$ced." ".$cedula;
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$s="Select * from usuario where usuario = '$usuario'";
$ss=mysql_query($s);
if($sss=mysql_num_rows($ss)!=0){
header("location: ../mal.php?bueno=2");
mysql_query("rollback");	
}
else{
$con="Select * from profesores where cedu_prof='$cedula'";
$conn=mysql_query($con);
if(mysql_num_rows($conn)==0){
$con2="Insert INTO profesores VALUES ('$nombre','$apellido','$cedula','$direc','$telef')";
$conn2=mysql_query($con2);
$con3="Insert into usuario values ('$nombre','$apellido','$cedula','$usuario','$pass','Profesor','No','Null','Null')";
$conn3=mysql_query($con3);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Creo una cuenta para el profesor','$variable','$fecha')";
$consu=mysql_query($consulta);
if($conn2 && $conn3 && $consu){
mysql_query("COMMIT");
header("location: ../bien.php?p=2");
}else{
mysql_query("rollback");
header("location: ../mal.php?bueno=4");
}}
if(mysql_num_rows($conn)!=0){
mysql_query("rollback");
header("location: ../mal.php?bueno=3");}}
?>