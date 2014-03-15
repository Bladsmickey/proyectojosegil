<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["vacu"])) { 
    $delete = $_POST["vacu"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update vacuna set habil='No' WHERE cod_va='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$extra="select * from vacuna where cod_va = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$nom=$array['nom_va'];
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino vacuna','$nom','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: Habvacunas.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?no_enviado=2");
}  
?>