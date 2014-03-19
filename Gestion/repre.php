<?php
require('../conexion.php');
$cedula=$_GET['cedularepre'];
$sth = mysql_query("SELECT * from representante where ci_r = '$cedula'");
$row = mysql_fetch_Assoc($sth);

if(($row['sexo'])=='M'){$sexi='Masculino';}else{$sexi="Femenino";}

if($sth){

$json = array(
    'Nombre' => 	$row['nom'],
    'Apellido' => 	$row['ape'],
    'cedula' => 	$row['ci_r'],
    'sexo' => 		$sexi,
    'fech_nac' => 	$row['est_civ'],
    'paren' => 		$row['pare_r'],
    'niv_educ' => 	$row['niv_ac'],
    'prof' => 		$row['profesion'],
    'lug_tra' => 	$row['lugar_tr'],
    'dire_tra' => 	$row['dir_tra'],
    'tele_tra' => 	$row['tlf_tr'],
    'dire_res' => 	$row['dir_rep'],
    'tele_res' => 	$row['tlf_rep'],
);
 
 echo json_encode($json);

}else{
	echo null;
}
?>