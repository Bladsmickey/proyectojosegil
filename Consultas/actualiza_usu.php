<?php
$fecha=date("Y-m-d");
$cedula=$_GET['cedula'];
$nom=$_GET['nombre'];
$ape=$_GET['apellido'];
$c1=$_GET['correo'];
@$c2=$_GET['correo2'];
session_start();
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$ced="C.I:";
$variable=$nom." ".$ape." ".$ced." ".$cedula;
if(isset($_POST['correo2'])){
$cons="Update usuario set nom_usu='$nom', ape_usu='$ape', correo='$c1', correo_al='$c2' where cedula_usu='$cedula'";
$cons2=mysql_query($cons);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Actualizacion de datos del usuario','$variable','$fecha')";
$consu=mysql_query($consulta);
}else{
$cons="Update usuario set nom_usu='$nom', ape_usu='$ape', correo='$c1', correo_al='Null' where cedula_usu='$cedula'";
$cons2=mysql_query($cons);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Actualizacion de datos del usuario','$variable','$fecha')";
$consu=mysql_query($consulta);
}
if($cons && $consu){
header("location: consulta_usuario.php?cedulau=$cedula");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?modificado=2");
}  
?>