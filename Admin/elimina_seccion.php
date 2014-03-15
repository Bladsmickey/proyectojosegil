<?php
$fecha=date("Y-m-d");
session_start();
require("../conexion.php");
if(isset($_POST["secc"])) { 
    $delete = $_POST["secc"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
         $del_id = $delete[$i]; 
         $sql = "Update seccion_cont set habil='No' WHERE cod='$del_id'"; 
         $result = mysql_query($sql); 
    } 

}
$extra="select * from seccion_cont where cod = '$del_id'";
$extra2=mysql_query($extra);
$array=mysql_fetch_assoc($extra2);
$sec=$array['seccion'];
$men=$array['mencion'];
$ano=$array['ano'];
if($ano==1){$anon="1ero";}
if($ano==2){$anon="2do";}
if($ano==3){$anon="3ro";}
if($ano==4){$anon="4to";}
if($ano==5){$anon="5to";}
if($men!=""){
$variable=$sec." ".mencion." ".$men." ".de." ".$anon;
}else{
$variable=$sec." ".de." ".$anon;
}
$consulta="Insert into accion values ('{$_SESSION['usuario']}','Elimino seccion','$variable','$fecha')";
$consu=mysql_query($consulta);
if($result && $consu){
header("location: agregar_secciones.php");
mysql_query("COMMIT");}
else{ 
mysql_query("rollback");
header("location: ../mal.php?noenviado=2");
}  
?>