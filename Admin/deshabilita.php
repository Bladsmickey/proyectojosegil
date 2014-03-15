<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["profh"])) { 
    $delete = $_POST["profh"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update usuario Set habil='No' WHERE cedula_usu='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Deshabilito usuario profesor','$del_id','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: habilitar.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?no_enviado=2");
}  
?>