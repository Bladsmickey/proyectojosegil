<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["enfer"])) { 
    $delete = $_POST["enfer"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update enfermedad set habil='No' WHERE cod_enf='$del_id'"; 
         $result = mysql_query($sql); 
    }
}
$extra="select * from enfermedad where cod_enf = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$nom=$array['tipo_enf'];
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino enfermedad','$nom','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: Habenfermedades.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?no_enviado=4");
}
?>