<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["mate"])) { 
    $delete = $_POST["mate"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update materia set habil='No' WHERE cod_mat='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$extra="select * from materia where cod_mat = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$nom=$array['nom_mat'];
$ano=$array['ano_mat'];
$men=$array['mencion'];
if($ano==1){$anon="1ero";}
if($ano==2){$anon="2do";}
if($ano==3){$anon="3ro";}
if($ano==4){$anon="4to";}
if($ano==5){$anon="5to";}
if($men!="Null"){
$variable=$nom." ".mencion." ".$men." ".de." ".$anon;
}else{
$variable=$nom." ".de." ".$anon;
}
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino materia','$variable','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: agregar_materia.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?noenviado=1");
}  
?>