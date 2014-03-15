<?php
if(isset($_GET['nombrer'])):
//Array de datos Representante
require('../conexion.php');
mysql_query("SET NAMES 'utf8'");

$fecha=date("Y-m-d");
session_start();

$civil=ucwords(strtolower($_GET['civil']));
$profesionr=ucwords(strtolower($_GET['profesionr']));
$lugartr=ucwords(strtolower($_GET['lugartr']));
$diretr=ucwords(strtolower($_GET['diretr']));
$codigo1=$_GET['codigo1'];
$telefonor=$codigo1."".$_GET['telefonor'];
$direccr=ucwords(strtolower($_GET['direccr']));
$codigo2=$_GET['codigo2'];
$telrr=$codigo2."".$_GET['telrr'];

//datos seccion
$escolaridad=$_GET['anoestu'];
if(isset($_GET['mencion'])){
$mencion=$_GET['mencion'];
}else{
$mencion='Null';}

$consultsecc="SELECT * FROM `seccion_cont` WHERE `ano`='$escolaridad' AND `mencion`='$mencion' AND `conteo` <=  '30'";
$resultconsultsecc=mysql_query($consultsecc);
$datossec=mysql_fetch_assoc($resultconsultsecc);
$codsecc=$datossec['col'];
$seccionni=$datossec['seccion'];
$secact=$escolaridad.$seccionni;


//Datos nino
$cedulan=$_GET['cedulan'];
$diren=$_GET['diren'];
$codigo3=$_GET['codigo3'];
$codigo4=$_GET['codigo4'];
$telen=$codigo3."".$_GET['telen'];
$teleemer=$codigo4."".$_GET['teleemer'];
$respons=ucwords(strtolower($_GET['respons']));
$parentescon=ucwords(strtolower($_GET['parentescon']));
$secpasa="SELECT * FROM `secciones` WHERE `ce_e`=$cedulan"
$resultpas=mysql_query($secpasa);
$datospas=mysql_fetch_assoc($resultpas);
$secpas=$datospas['anho_est'].$datospas['seccion'];



//Situacion vivienda

if(isset($_GET['Checkbox1'])){$Checkbox1=$_GET['Checkbox1'];}else{$Checkbox1="";}
if(isset($_GET['Checkbox2'])){$Checkbox2=$_GET['Checkbox2'];}else{$Checkbox2="";}
if(isset($_GET['Checkbox3'])){$Checkbox3=$_GET['Checkbox3'];}else{$Checkbox3="";}
if(isset($_GET['Checkbox4'])){$Checkbox4=$_GET['Checkbox4'];}else{$Checkbox4="";}
if(isset($_GET['Checkbox5'])){$Checkbox5=$_GET['Checkbox5'];}else{$Checkbox5="";}
if(isset($_GET['Checkbox6'])){$Checkbox6=$_GET['Checkbox6'];}else{$Checkbox6="";}
$vive="$Checkbox1"." "."$Checkbox2"." "."$Checkbox3"." "."$Checkbox4"." "."$Checkbox5"." "."$Checkbox6";
$numper=$_GET['numper'];
$Select1=$_GET['Select1'];
$alq=$_GET['alq'];
if(isset($_GET['Checkbox9'])){$Checkbox9=$_GET['Checkbox9'];}else{$Checkbox9="";}
if(isset($_GET['Checkbox10'])){$Checkbox10=$_GET['Checkbox10'];}else{$Checkbox10="";}
if(isset($_GET['Checkbox11'])){$Checkbox11=$_GET['Checkbox11'];}else{$Checkbox11="";}
if(isset($_GET['Checkbox12'])){$Checkbox12=$_GET['Checkbox12'];}else{$Checkbox12="";}
if(isset($_GET['Checkbox13'])){$Checkbox13=$_GET['Checkbox13'];}else{$Checkbox13="";}
$servicios="$Checkbox9"." "."$Checkbox10"." "."$Checkbox11"." "."$Checkbox12"." "."$Checkbox13";
$becaa=$_GET['becaa'];
@$Text30=$_GET['Text30'];
$Select1=$_GET['Select1'];


mysql_query("BEGIN");


$consulr="UPDATE  `liceo`.`representante` SET `est_civ` =  '$civil',`edad_r` =  edad_r+1,`profesion` =  '$profesionr',`lugar_tr` =  '$lugartr',`dir_tra` =  '$diretr',`tlf_tr` =  '$telefonor',`dir_rep` =  '$direccr',`tlf_rep` =  '$telrr' WHERE  `representante`.`ci_e` =  '$cedulan'";
$resultr=mysql_query($consulr);


$consultn="UPDATE  `liceo`.`estudiante` SET `edad` = edad+1,  `direccion` =  '$diren',`telefono` =  '$telen',`tlf_res` =  '$teleemer',`resp_em` =  '$respons',`parentesco` =  '$parentescon' WHERE  `estudiante`.`ced_e` =  '$cedulan'";
$resultn=mysql_query($consultn);



$consultviv="UPDATE  `liceo`.`grupo_fam` SET  `per_viv` =  '$vive',`nu_pers` =  '$numper',`tipo_vi` =  '$Select1',`mont_al` =  '$alq',`sevicios_viv` =  '$servicios',`be_est` =  '$becaa',`or_otor` =  '$Text30',`ing_mens` =  '$Select1' WHERE  `grupo_fam`.`ced_e` =  '$cedulan'";
$resultvive=mysql_query($consultviv);

$borrrarsec="DELETE FROM `liceo`.`secciones` WHERE `secciones`.`ce_e` = '$cedulan'";
$resultsec=mysql_query($borrrarsec);

$consultasig="INSERT INTO `liceo`.`secciones` (`cod_sec`, `ce_e`, `anho_est`, `mencion`, `seccion`, `habil`) VALUES ('$codsecc', '$cedulan', '$escolaridad', '$mencion', '$seccionni', 'Si')";
$resultasig=mysql_query($consultasig);



//Datos vacunas del estudiante
$c1="DELETE FROM `estu_va` WHERE `ced_e`='$cedulan'";
$c1r=mysql_query($c1);
$c2="DELETE FROM `estu_hab` WHERE `ced_e`='$cedulan'";
$c2r=mysql_query($c2);
$c3="DELETE FROM `estu_enfer` WHERE `ced_e`='$cedulan'";
$c3r=mysql_query($c3);
$c4="DELETE FROM `estu_div` WHERE `ced_e`='$cedulan'";
$c4r=mysql_query($c4);
$c5="DELETE FROM `ma_con_es` WHERE `id_alum`='$cedulan'";
$c5r=mysql_query($c5);


if(isset($_GET['vacu'])){
  if (is_array($_GET['vacu'])) {
    foreach($_GET['vacu'] as $value){
     $consultvacu="INSERT INTO `liceo`.`estu_va` (`cod_va`, `ced_e`) VALUES ('$value', '$cedulan')";
     $consultvacur=mysql_query($consultvacu);
    }
  } else {
    $value = $_GET['vacu'];    
     $consultvacu="INSERT INTO `liceo`.`estu_va` (`cod_va`, `ced_e`) VALUES ('$value', '$cedulan')";
     $consultvacur=mysql_query($consultvacu);
  }
}

 @$serializeArray = serialize($_GET['obser']);
 $vard=unserialize($serializeArray);

//Datos habilidades del estudiante

if(isset($_GET['habi'])){
  if (is_array($_GET['habi'])) {
    $var1=0;
    foreach($_GET['habi'] as $value){
     $consulthabi="INSERT INTO `liceo`.`estu_hab` (`cod_ha`, `ced_e`,`observ_ha`) VALUES ('$value', '$cedulan','$vard[$var1]')";
     $consulthabir=mysql_query($consulthabi);
     $var1+=1;
  
    }
  } else {
    $value = $_GET['habi'];
    $consulthabi="INSERT INTO `liceo`.`estu_hab` (`cod_ha`, `ced_e`,`observ_ha`) VALUES ('$value', '$cedulan','$vard[0]')";
    $consulthabir=mysql_query($consulthabi);
  }
}

//Datos enfermedades del estudiante

if(isset($_GET['enfer'])){
  if (is_array($_GET['enfer'])) {
    foreach($_GET['enfer'] as $value){
     $consultenf="INSERT INTO `liceo`.`estu_enfer` (`ced_e`,`cod_enf`) VALUES ('$cedulan', '$value')";
     $consultenfr=mysql_query($consultenf);
  
    }
  } else {
    $value = $_GET['enfer'];
    $consultenf="INSERT INTO `liceo`.`estu_enfer` (`ced_e`,`cod_enf`) VALUES ('$cedulan', '$value')";
    $consultenfr=mysql_query($consultenf);
  }
}

//datos diversidad

if(isset($_GET['fun'])){
  if (is_array($_GET['fun'])) {
    foreach($_GET['fun'] as $value){
     $consultenf="INSERT INTO `liceo`.`estu_div` (`cod_div`,`ced_e`) VALUES ('$value', '$cedulan')";
     $consultenfr=mysql_query($consultenf);
  
    }
  } else {
    $value = $_GET['fun'];
    $consultenf="INSERT INTO `liceo`.`estu_div` (`cod_div`,`ced_e`) VALUES ('$value', '$cedulan')";
    $consultenfr=mysql_query($consultenf);
  }
}
    
    
 if(isset($_GET["mate"])) { 
    $delete = $_GET["mate"]; 
    $cantidad = count($delete);
    for ($i="0"; $i<$cantidad; $i++) {  
        echo $del_id = $delete[$i]; 
        if($cantidad<=2) {$consultmate="INSERT INTO `liceo`.`ma_con_es` (`id_alum`, `cod_ma`, `cod_cond`,`sec_act`,`sec_pas`) VALUES ('$cedulan', '$del_id', '1','$secact','$secpas')";}
        else{$consultmate="INSERT INTO `liceo`.`ma_con_es` (`id_alum`, `cod_ma`, `cod_cond`,`sec_act`,`sec_pas`) VALUES ('$cedulan', '$del_id', '2','$secact','$secpas')";
}

     $consultmater = mysql_query($consultmate); 
    } 

}



$cc="Select nome,apee from estudiante where ced_e='$cedulan'";
$dd=mysql_query($cc);
$ee=mysql_fetch_assoc($dd);
$nome=$ee['nome'];
$apee=$ee['apee'];

$ced="C.I:";
$variable=$nome." ".$apee." ".$ced." ".$cedulan;

$consulta="Insert into accion values ('{$_SESSION['usuario']}','Reinscribio al estudiante','$variable','$fecha')";
$consu=mysql_query($consulta);

if($resultr && $resultn && $resultvive && $resultasig && $consu){
mysql_query("COMMIT");

header("location: ../planilla.php?cedula=$cedulan");
}else{
mysql_query("rollback");
}

endif;


?>
