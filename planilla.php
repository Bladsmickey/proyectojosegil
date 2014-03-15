<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Planilla de Inscripci&oacute;n</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
     <link href="examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">
    


    <!-- Custom styles for this template -->
    <link href="examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">
.img-repre{
position:relative;
left:-50px;

}

.img-estu{
position:relative;
left:50px;
}

	
	</style>


  </head>

  <body>
  <div class="wrap">

<?php require('header.php'); ?>
</div><br>

     <div class="container777">
  <br>	
  
<div name="header" class="container text-center">
 <p><img alt="" height="76" src="Imagenes/logoo.jpg" width="793"></p>

      &nbsp;<h6><b>

      <img alt="" src="Imagenes/repre.png" class="img-repre">FICHA DE INSCRIPCION Y REINSCRIPCION</b><img alt="" src="Imagenes/estu.png" class="img-estu"></h6>

         </div>
      



<div name="nino">
<h6 class="text-left"><b>DATOS DE IDENTIFICACION DEL O LA ESTUDIANTE:</b></h6>
<p class="text-justify">

<?php
$cedula=$_GET['cedula'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$query1="Select * from estudiante where ced_e=$cedula";
$datos=mysql_query($query1);
$resultado=mysql_fetch_array($datos);

echo sprintf ("Apellidos y Nombres: <u>%s, %s</u>&nbsp;",$resultado['nome'],$resultado['apee']);		
echo sprintf ("C.I.N.V°: <u>%s</u>&nbsp;",$resultado['ced_e']);	 
echo sprintf ("Sexo: <u>%s</u>&nbsp;",$resultado['sexo']);
echo sprintf ("Edad: <u>%s</u>&nbsp;",$resultado['edad']);	
echo sprintf ("Fecha de Nacimiento: <u>%s</u>&nbsp;",$resultado['fecha_nac']);
echo sprintf ("Lugar de Nacimiento: <u>%s</u>&nbsp;",$resultado['lugar_nac']);		
echo sprintf ("Estado: <u>%s</u>&nbsp;",$resultado['estado']);	
echo sprintf ("Direccion de Residencia: <u>%s</u>&nbsp;",$resultado['direccion']);	
echo sprintf ("Telefono Residencial: <u>%s</u>&nbsp;",$resultado['telefono']);	
echo sprintf ("Telefono en caso de Emergencia: <u>%s</u>&nbsp;",$resultado['tlf_res']);	
echo sprintf ("Responsable del telefono de Emergencia: <u>%s</u>&nbsp;",$resultado['resp_em']);
echo sprintf ("Parentesco: <u>%s</u>&nbsp;",$resultado['parentesco']);		 
echo sprintf ("Institucion de Procedencia: <u>%s</u>&nbsp;",$resultado['inst_proc']);	
echo sprintf ("Municipio: <u>%s</u>&nbsp;",$resultado['municipio']);	 
echo sprintf ("Estado: <u>%s</u>&nbsp;",$resultado['estado']);
echo sprintf ("Institucion(es) de Educacion Secundaria cercana(s) a la vivienda: <u>%s</u>",$resultado['inst_sec']);

?>

  </p>   </div>
      
      
      
<div name="repre">
<h6 class="text-left"><b>DATOS DEL REPRESENTANTE LEGAL</b></h6>

 <p class="text-justify">
 
<?php
$cedula=$_GET['cedula'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$query1="Select * from representante where ci_e=$cedula";
$datos=mysql_query($query1);
$resultado=mysql_fetch_array($datos);


echo sprintf ("Apellidos y Nombres: <u>%s, %s</u>&nbsp;",$resultado['nom'],$resultado['ape']);		
echo sprintf ("C.I.N.V°: <u>%s</u>&nbsp;",$resultado['ci_r']);
echo sprintf ("Parentesco: <u>%s</u>&nbsp;",$resultado['pare_r']);
echo sprintf ("Edad: <u>%s</u>&nbsp;",$resultado['edad_r']);		 
echo sprintf ("Sexo: <u>%s</u>&nbsp;",$resultado['sexo']);
echo sprintf ("Nivel Academico: <u>%s</u>&nbsp;",$resultado['niv_ac']);
echo sprintf ("Profesion u Oficio: <u>%s</u>&nbsp;",$resultado['profesion']);
echo sprintf ("Lugar de trabajo: <u>%s</u>&nbsp;",$resultado['lugar_tr']);
echo sprintf ("Direccion del Trabajo: <u>%s</u>&nbsp;",$resultado['dir_tra']);
echo sprintf ("Telefono del trabajo: <u>%s</u>&nbsp;",$resultado['tlf_tr']);
echo sprintf ("Direccion de Residencia: <u>%s</u>&nbsp;",$resultado['dir_rep']);
echo sprintf ("Telefone residencia: <u>%s</u>&nbsp;",$resultado['tlf_rep']);
echo sprintf ("Estado Civil:: <u>%s</u>&nbsp;",$resultado['est_civ']);
?>


 
 
 </p>	 

      </div>
      
      
<div name="fam">
<h6 class="text-left"><b>DATOS DEL GRUPO FAMILIAR DEL O LA ESTUDIANTE</b></h6>
 <p class="text-justify">
 
 
<?php
$cedula=$_GET['cedula'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$query1="Select * from grupo_fam where ced_e=$cedula";
$datos=mysql_query($query1);
$resultado=mysql_fetch_array($datos);


echo sprintf ("Persona con las que vive el o la estudiante: <u>%s</u>&nbsp;",$resultado['per_viv']);		
echo sprintf ("N.V° de personas que viven en el hogar: <u>%s</u>&nbsp;",$resultado['nu_pers']);
echo sprintf ("Tipo de Vivienda: <u>%s</u>&nbsp;",$resultado['tipo_vi']);
echo sprintf ("Tenencia de la Vivienda: <u>%s</u>&nbsp;",$resultado['mont_al']);		 
echo sprintf ("Monto del Alquiler: <u>%s</u>&nbsp;",$resultado['mont_al']);
echo sprintf ("Servicios que posee la vivienda: <u>%s</u>&nbsp;",$resultado['sevicios_viv']);
echo sprintf ("Posee beca el o la estudiante: <u>%s</u>&nbsp;",$resultado['be_est']);
echo sprintf ("Organismo que la otorga: <u>%s</u>&nbsp;",$resultado['or_otor']);
echo sprintf ("ingreso familiar mensual: <u>%s</u>&nbsp;",$resultado['ing_mens']);	
?>

 
 
 
 </p>	 
      </div>

<div name="salud">
<h6 class="text-left"><b>SALUD DEL ESTUDIANTE:</b></h6>
<?php
$cedula=$_GET['cedula'];
require("conexion.php");
mysql_query("SET NAMES 'utf8'");
$query1="Select `cod_va` from estu_va where ced_e=$cedula";
$datos=mysql_query($query1);
echo sprintf("<div class='form-group'>");
echo "Vacunas recibidas:";

while($row = mysql_fetch_array($datos)){
$vacuna=$row['cod_va'];
$consut="SELECT * FROM VACUNA WHERE COD_VA='$vacuna'";
$RESULTADO=mysql_query($consut);
$DATOS=mysql_fetch_array($RESULTADO);

echo sprintf("<label>%s</label>&nbsp;<input type='checkbox' checked='checked' disabled='disabled'>&nbsp;",$DATOS['nom_va']);


}

$query1="Select `cod_enf` from estu_enfer where ced_e=$cedula";
$datos=mysql_query($query1);


echo "Enfermedades presentadas:";

while($row = mysql_fetch_array($datos)){
$vacuna=$row['cod_enf'];
$consut="SELECT * FROM enfermedad WHERE COD_enf='$vacuna'";
$RESULTADO=mysql_query($consut);
$DATOS=mysql_fetch_array($RESULTADO);


echo sprintf("<label>%s</label>&nbsp;<input type='checkbox' checked='checked' disabled='disabled'>&nbsp;",$DATOS['tipo_enf']);


}

$query1="Select `cod_div` from estu_div where ced_e=$cedula";
$datos=mysql_query($query1);


echo "Diversidades:";

while($row = mysql_fetch_array($datos)){
$vacuna=$row['cod_div'];
$consut="SELECT * FROM diversidad_fun WHERE COD_div='$vacuna'";
$RESULTADO=mysql_query($consut);
$DATOS=mysql_fetch_array($RESULTADO);


echo sprintf("<label>%s</label>&nbsp;<input type='checkbox' checked='checked' disabled='disabled'>&nbsp;",$DATOS['nom_div']);


}

echo sprintf("</div>");

?>
</div>

 <div name="activ">
 <h6 class="text-left"><b>ACTIVIDADES DE INTERES:</b></h6>

<p><?php
$cedula=$_GET['cedula'];
$query1="Select `cod_ha` from estu_hab where ced_e=$cedula";
$datos=mysql_query($query1);



while($row = mysql_fetch_array($datos)){
$vacuna=$row['cod_ha'];
$consut="SELECT * FROM habilidad WHERE COD_hab='$vacuna'";
$RESULTADO=mysql_query($consut);
$DATOS=mysql_fetch_array($RESULTADO);


echo sprintf("<label>%s</label>&nbsp;<input type='checkbox' checked='checked' disabled='disabled'>&nbsp;",$DATOS['tipo_hab']);


}

echo '<center></br></br></br><form><input type="button" Class="hidden-print" value="Imprimir datos" onclick="window.print();return false;"/></form></center>';


?></p>	 
 

      </div>

<div name="reins">
<p></p>	 

      </div>


      </div>
       
 <?php require('footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
