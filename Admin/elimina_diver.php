<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["fun"])) { 
    $delete = $_POST["fun"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update diversidad_fun set habil='No' WHERE cod_div='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$extra="select * from diversidad_fun where cod_div = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$nom=$array['nom_div'];
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino Diversidad','$nom','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){

mysql_query("COMMIT");header("location: agregar_diversidad.php");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?no_enviado=3");
}  
?>