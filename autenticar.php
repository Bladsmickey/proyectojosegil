<?php
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
require("conexion.php");
$sql="SELECT * FROM usuario where usuario='$usuario'";
$result=mysql_query($sql);
$hola=mysql_fetch_assoc($result);
if($hola){
if($hola['habil']=="No"){
header("location: login.php?error=3");
}else if(crypt($contrasena, $hola['cont_usu']) == $hola['cont_usu']){
session_start();
$_SESSION['usuario']=$usuario;
$_SESSION['nivel']=$hola['categoria'];
$_SESSION['cedula']=$hola['cedula_usu'];
$_SESSION['correo']=$hola['correo'];
if(isset($_POST['cerrar'])){
$_SESSION['sesion']=1;}else{
$_SESSION['sesion']=0;	
}
header("location: index.php");	
}else{
header("location: login.php?error=1");	
}}else{
header("location: login.php?error=1");	
}

?>