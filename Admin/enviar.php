<?php
$fecha=date("Y-m-d");
session_start();
$nombre=ucwords(strtolower($_GET['nombre']));
$apellido=ucwords(strtolower($_GET['apellido']));
$cedula=$_GET['cedula'];
$usuario=$_GET['usuario'];


function encriptar($password, $digito = 7) {
$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$salt = sprintf('$2a$%02d$', $digito);
for($i = 0; $i < 22; $i++)
{
    $salt .= $set_salt[mt_rand(0, 63)];
}
return crypt($password, $salt);
}


$pass=encriptar($_GET['pass']);



$categ=$_GET['Select2'];
$correo=$_GET['correo'];
@$correo2=$_GET['correo2'];
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
$con="Select * from usuario where cedula_usu='$cedula'";
$conn=mysql_query($con);
if(mysql_num_rows($conn)==0){
if(isset($_GET['correo2'])){
$con2="Insert INTO usuario VALUES ('$nombre','$apellido','$cedula','$usuario','$pass','$categ','Si','$correo','$correo2')";
$conn2=mysql_query($con2);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Creo una cuenta de usuario para','$variable','$fecha')";
$consu=mysql_query($consulta);}
else{
$con2="Insert INTO usuario VALUES ('$nombre','$apellido','$cedula','$usuario','$pass','$categ','Si','$correo','Null')";
$conn2=mysql_query($con2);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Creo una cuenta de usuario para','$variable','$fecha')";
$consu=mysql_query($consulta);
}
if($conn2 && $consu){
mysql_query("COMMIT");
header("location: ../bien.php?cs=2");
}else{
mysql_query("rollback");
header("location: .../mal.php?bueno=4");
}}
if(mysql_num_rows($conn)!=0){
mysql_query("rollback");
header("location: ../mal.php?bueno=3");}}
?>