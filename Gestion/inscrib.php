<?php
if(isset($_POST['nombrer'])):
//Array de datos Representante
require('../conexion.php');
mysql_query("SET NAMES 'utf8'");

$fecha=date("Y-m-d");
session_start();

$nombrer=ucwords(strtolower($_POST['nombrer']));
$apellidor=ucwords(strtolower($_POST['apellidor']));
$cedular=$_POST['cedular'];
$sexor=$_POST['sexor'];
$civil=ucwords(strtolower($_POST['civil']));
$nacnp=$_POST['nacnp'];
$edadr=floor((time()-strtotime($nacnp))/31556926);
$parentescor=ucwords(strtolower($_POST['parentescor']));
$Niveldur=ucwords(strtolower($_POST['Niveldur']));
$profesionr=ucwords(strtolower($_POST['profesionr']));
$lugartr=ucwords(strtolower($_POST['lugartr']));
$diretr=ucwords(strtolower($_POST['diretr']));
$codigo1=$_POST['codigo1'];
$telefonor=$codigo1."".$_POST['telefonor'];
$direccr=ucwords(strtolower($_POST['direccr']));
$codigo2=$_POST['codigo2'];
$telrr=$codigo2."".$_POST['telrr'];
$nacionr=$_POST['nacion'];

//datos seccion
$escolaridad=$_POST['anoestu'];

if(isset($_POST['mencion'])){
$mencion=$_POST['mencion'];
}else{
$mencion='Null';}


$consultsecc="SELECT * FROM `seccion_cont` WHERE `ano`='$escolaridad' AND `mencion`='$mencion' AND `conteo` <=  '30'";
$resultconsultsecc=mysql_query($consultsecc);
$datossec=mysql_fetch_assoc($resultconsultsecc);
$codsecc=$datossec['col'];
$seccionni=$datossec['seccion'];

//Datos nino

$nombren=ucwords(strtolower($_POST['nombren']));
$apen=ucwords(strtolower($_POST['apen']));
$cedulan=$_POST['cedulan'];
$sexon=$_POST['sexon'];
$nacn=$_POST['nacn'];
$edad=floor((time()-strtotime($nacn))/31556926);
$lugar=ucwords(strtolower($_POST['lugar']));
$diren=ucwords(strtolower($_POST['diren']));
$codigo3=$_POST['codigo3'];
$codigo4=$_POST['codigo4'];
$telen=$codigo3."".$_POST['telen'];
$teleemer=$codigo4."".$_POST['teleemer'];
$respons=ucwords(strtolower($_POST['respons']));
$parentescon=ucwords(strtolower($_POST['parentescon']));
$instprocn=ucwords(strtolower($_POST['instprocn']));

switch($_POST['estado']){
	case 1:{$estadon="Amazonas";}break;
	case 2:{$estadon="Anzoategui";}break;
	case 3:{$estadon="Apure";}break;
	case 4:{$estadon="Aragua";}break;
	case 5:{$estadon="Barinas";}break;
	case 6:{$estadon="Bolivar";}break;
	case 7:{$estadon="Carabobo";}break;
	case 8:{$estadon="Cojedes";}break;
	case 9:{$estadon="Delta Amacuro";}break;
	case 10:{$estadon="Distrito Federal";}break;
	case 11:{$estadon="Falcon";}break;
	case 12:{$estadon="Guarico";}break;
	case 13:{$estadon="Lara";}break;
	case 14:{$estadon="Merida";}break;
	case 15:{$estadon="Miranda";}break;
	case 16:{$estadon="Monagas";}break;
	case 17:{$estadon="Nueva Esparta";}break;
	case 18:{$estadon="Portuguesa";}break;
	case 19:{$estadon="Sucre";}break;
	case 20:{$estadon="Tachira";}break;
	case 21:{$estadon="Trujillo";}break;
	case 22:{$estadon="Yaracuy";}break;
	case 23:{$estadon="Vargas";}break;
	case 24:{$estadon="Zulia";}break;
	}

$municn=ucwords(strtolower($_POST['ciudad']));
$inscerca=ucwords(strtolower($_POST['inscerca']));
$nacionn=$_POST['nacionn'];

//Situacion vivienda

if(isset($_POST['Checkbox1'])){$Checkbox1=$_POST['Checkbox1'];}else{$Checkbox1="";}
if(isset($_POST['Checkbox2'])){$Checkbox2=$_POST['Checkbox2'];}else{$Checkbox2="";}
if(isset($_POST['Checkbox3'])){$Checkbox3=$_POST['Checkbox3'];}else{$Checkbox3="";}
if(isset($_POST['Checkbox4'])){$Checkbox4=$_POST['Checkbox4'];}else{$Checkbox4="";}
if(isset($_POST['Checkbox5'])){$Checkbox5=$_POST['Checkbox5'];}else{$Checkbox5="";}
if(isset($_POST['Checkbox6'])){$Checkbox6=$_POST['Checkbox6'];}else{$Checkbox6="";}
$vive="$Checkbox1"." "."$Checkbox2"." "."$Checkbox3"." "."$Checkbox4"." "."$Checkbox5"." "."$Checkbox6";
$numper=$_POST['numper'];
$Select1=$_POST['Select1'];
$alq=$_POST['alq'];
if(isset($_POST['Checkbox9'])){$Checkbox9=$_POST['Checkbox9'];}else{$Checkbox9="";}
if(isset($_POST['Checkbox10'])){$Checkbox10=$_POST['Checkbox10'];}else{$Checkbox10="";}
if(isset($_POST['Checkbox11'])){$Checkbox11=$_POST['Checkbox11'];}else{$Checkbox11="";}
if(isset($_POST['Checkbox12'])){$Checkbox12=$_POST['Checkbox12'];}else{$Checkbox12="";}
if(isset($_POST['Checkbox13'])){$Checkbox13=$_POST['Checkbox13'];}else{$Checkbox13="";}
$servicios="$Checkbox9"." "."$Checkbox10"." "."$Checkbox11"." "."$Checkbox12"." "."$Checkbox13";
@$becaa=$_POST['becaa'];
@$Text30=$_POST['Text30'];
$Select1=$_POST['Select1'];

$consulta_principal="Select * from estudiante where ced_e = '$cedulan'";
$consultica=mysql_query($consulta_principal);
if(mysql_num_rows($consultica)!=0){
header("location: ../mal.php?inscrito=1");
}else{

mysql_query("BEGIN");

$consulr="INSERT INTO `liceo`.`representante`(`nom` ,`ape` ,`ci_e` ,`ci_r` ,`nacionalidad` ,`pare_r` ,`sexo` ,`est_civ` ,`niv_ac` ,`edad_r` ,`profesion` ,`lugar_tr` ,`dir_tra` ,`tlf_tr` ,`dir_rep` ,`tlf_rep`)VALUES('$nombrer',  '$apellidor',  '$cedulan',  '$cedular', '$nacionr', '$parentescor',  '$sexor',  '$fecha', '$Niveldur',  '$edadr',  '$profesionr',  '$lugartr',  '$diretr',  '$telrr',  '$direccr',  '$telefonor')";
$resultr=mysql_query($consulr);


$consultn="INSERT INTO `liceo`.`estudiante` (`ced_e`,`nacion` , `nome`, `apee`, `id_alumno`, `fecha_nac`, `edad`, `sexo`, `lugar_nac`, `direccion`, `telefono`, `tlf_res`, `resp_em`, `parentesco`, `inst_proc`, `inst_sec`, `estado`, `municipio`, `turno`, `condicion`) VALUES ('$cedulan', '$nacionn', '$nombren', '$apen', '$cedulan', '$nacn', '$edad', '$sexon', '$lugar', '$diren', '$telen', '$teleemer', '$respons', '$parentescon', '$instprocn', '$inscerca', '$estadon', '$municn', 'Mañana', 'Normal')";
$resultn=mysql_query($consultn);


$consultviv="INSERT INTO  `liceo`.`grupo_fam` (`per_viv` ,`nu_pers` ,`tipo_vi` ,`mont_al` ,`sevicios_viv` ,`be_est` ,`or_otor` ,`ing_mens` ,`ced_e`) VALUES ('$vive', '$numper',  '$Select1',  '$alq',  '$servicios',  '$becaa',  '$Text30',  '$Select1',  '$cedulan')";
$resultvive=mysql_query($consultviv);

$consultasig="INSERT INTO `liceo`.`secciones` (`cod_sec`, `ce_e`, `anho_est`, `mencion`, `seccion`, `habil`) VALUES ('$codsecc', '$cedulan', '$escolaridad', '$mencion', '$seccionni', 'Si')";
$resultasig=mysql_query($consultasig);

//Datos vacunas del estudiante


if(isset($_POST['vacu'])){
  if (is_array($_POST['vacu'])) {
    foreach($_POST['vacu'] as $value){
     $consultvacu="INSERT INTO `liceo`.`estu_va` (`cod_va`, `ced_e`) VALUES ('$value', '$cedulan')";
     $consultvacur=mysql_query($consultvacu);
    }
  } else {
    $value = $_POST['vacu'];    
     $consultvacu="INSERT INTO `liceo`.`estu_va` (`cod_va`, `ced_e`) VALUES ('$value', '$cedulan')";
     $consultvacur=mysql_query($consultvacu);
  }
}

$serializeArray = serialize($_POST['obser']);
$vard=unserialize($serializeArray);

//Datos habilidades del estudiante

if(isset($_POST['habi'])){
  if (is_array($_POST['habi'])) {
    $var1=0;
    foreach($_POST['habi'] as $value){
     $consulthabi="INSERT INTO `liceo`.`estu_hab` (`cod_ha`, `ced_e`,`observ_ha`) VALUES ('$value', '$cedulan','$vard[$var1]')";
     $consulthabir=mysql_query($consulthabi);
     $var1+=1;
  
    }
  } else {
    $value = $_POST['habi'];
    $consulthabi="INSERT INTO `liceo`.`estu_hab` (`cod_ha`, `ced_e`,`observ_ha`) VALUES ('$value', '$cedulan','$vard[0]')";
    $consulthabir=mysql_query($consulthabi);
  }
}

//Datos enfermedades del estudiante

if(isset($_POST['enfer'])){
  if (is_array($_POST['enfer'])) {
    foreach($_POST['enfer'] as $value){
     $consultenf="INSERT INTO `liceo`.`estu_enfer` (`ced_e`,`cod_enf`) VALUES ('$cedulan', '$value')";
     $consultenfr=mysql_query($consultenf);
  
    }
  } else {
    $value = $_POST['enfer'];
    $consultenf="INSERT INTO `liceo`.`estu_enfer` (`ced_e`,`cod_enf`) VALUES ('$cedulan', '$value')";
    $consultenfr=mysql_query($consultenf);
  }
}

//datos diversidad

if(isset($_POST['fun'])){
  if (is_array($_POST['fun'])) {
    foreach($_POST['fun'] as $value){
     $consultenf="INSERT INTO `liceo`.`estu_div` (`cod_div`,`ced_e`) VALUES ('$value', '$cedulan')";
     $consultenfr=mysql_query($consultenf);
  
    }
  } else {
    $value = $_POST['fun'];
    $consultenf="INSERT INTO `liceo`.`estu_div` (`cod_div`,`ced_e`) VALUES ('$value', '$cedulan')";
    $consultenfr=mysql_query($consultenf);
  }
}

$ced="C.I:";
$variable=$nombren." ".$apen." ".$ced." ".$cedulan;

$consulta="Insert into accion values ('{$_SESSION['usuario']}','Inscribio al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);


if($resultr && $resultn && $resultvive && $consu && $resultasig){
mysql_query("COMMIT");

header("location: ../planilla.php?cedula=$cedulan");
}else{
mysql_query("rollback");
}
}

endif;



?>
