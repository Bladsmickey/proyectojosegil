<?php
require("../conexion.php");
if ( !empty($_FILES["enviar2"]) ) {

$bd=$_FILES["enviar2"]["name"];
$rutaTemporal=$_FILES["enviar2"]["tmp_name"];
$rutaEnServidor='../Respaldos/wiii';
$rutaDestino=$rutaEnServidor.'/'.$bd;

$consulta="Select * from respaldo where bd = '$bd'";
$verifica=mysql_query($consulta);
if($verifica){

move_uploaded_file($rutaTemporal,$rutaDestino);
system("C:/wamp/bin/mysql/mysql5.6.12/bin/mysql.exe -u root liceo < C:/wamp/www/Respaldos/wiii");
mysql_query("COMMIT");
header("location: ../bien.php?rest=1");
}else{
mysql_query("rollback");
header("location: ../mal.php?rest=2");
}
}
?>