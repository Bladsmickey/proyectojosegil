<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["habil"])) { 
    $delete = $_POST["habil"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update habilidad set habil='No' WHERE cod_hab='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$extra="select * from habilidad where cod_hab = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$nom=$array['tipo_hab'];
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino habilidad','$nom','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: agregar_actividades.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?no_enviado=1");
}  
?>