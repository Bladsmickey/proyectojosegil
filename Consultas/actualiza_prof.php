<?php
$fecha=date("Y-m-d");
$cedula=$_GET['cedula'];
$nom=$_GET['nombre'];
$ape=$_GET['apellido'];
$c1=$_GET['direcc'];
$c2=$_GET['telef'];
session_start();
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$ced="C.I:";
$variable=$nom." ".$ape." ".$ced." ".$cedula;
$cons="Update usuario set nom_usu='$nom', ape_usu='$ape' where cedula_usu='$cedula'";
$cons2=mysql_query($cons);
$cons="Update profesores set nom_prof='$nom', ape_prof='$ape', direc_prof='$c1', tlf_prof='$c2' where cedu_prof='$cedula'";
$cons2=mysql_query($cons);
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Actualizacion de datos de usuario profesor','$variable','$fecha')";
$consu=mysql_query($consulta);
if($cons && $consu){
header("location: consulta_profesor.php?cedulap=$cedula");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?modificado=2");
}  
?>