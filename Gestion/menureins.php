
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Reinscripcion</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <link href="../dist/css/bootstrap-form-helpers.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script language="JavaScript" type="text/JavaScript">
window.onload = function () {

    document.getElementById("becasi").onclick = modificarEstado;
    document.getElementById("becano").onclick = modificarEstado;
    document.getElementById("inline1").onclick = modificarEstado;
    document.getElementById("inline2").onclick = modificarEstado;
    document.getElementById("inline3").onclick = modificarEstado;
    document.getElementById("inline4").onclick = modificarEstado;
    document.getElementById("inline5").onclick = modificarEstado;


}

function modificarEstado(){
    if (document.getElementById("becasi").checked) {
        document.getElementById("Text30").disabled = false;
    }

    if (document.getElementById("becano").checked) {
        document.getElementById("Text30").disabled = true;
    }
    
    
 
 if (document.getElementById("inline1").checked) {
        document.getElementById("mencion").disabled = true;
    }
 if (document.getElementById("inline2").checked) {
        document.getElementById("mencion").disabled = true;
    }
 if (document.getElementById("inline3").checked) {
        document.getElementById("mencion").disabled = true;
    }
if (document.getElementById("inline4").checked) {
        document.getElementById("mecion").disabled = false;
    }
if (document.getElementById("inline5").checked) {
        document.getElementById("mencion").disabled = false;
    }

}

        function nextTab(elem) {
  $(elem + ' li.active')
    .next()
    .find('a[data-toggle="tab"]')
    .click();
}
function prevTab(elem) {
  $(elem + ' li.active')
    .prev()
    .find('a[data-toggle="tab"]')
    .click();
}
 
</script>


<script type="text/javascript">
function validar(e,solicitar){
  // Admitir solo letras
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==8) return true;
  patron =/[\D\s]/;
  te = String.fromCharCode(tecla);
  if (!patron.test(te)) return false;
  // No amitir espacios iniciales y convertir 1ª letra a mayúscula
  txt = solicitar.value;
  if(txt.length==0 && te==' ') return false;
  if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
    solicitar.value = txt+te.toUpperCase();
    return false;
  } 
}
</script>

<?php
require('../conexion.php');
$cedula=$_GET['cedula'];
$datos="SELECT * FROM estudiante,representante,grupo_fam where estudiante.ced_e='$cedula' and representante.ci_e='$cedula' and grupo_fam.ced_e='$cedula'";
$datosr=mysql_query($datos);
$resultado=mysql_fetch_array($datosr);
if(mysql_num_rows($datosr)==0){
header("location: ../mal.php?noinscrito=1");
}
?>

  </head>

  <body>

    <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">

      <ul class="nav nav-tabs nav-justified" id="menu">
  <li class="active" ><a href="#padre" data-toggle="tab">1. Datos del Representante legal</a></li>
  <li><a href="#estudiante" data-toggle="tab">2. Datos del estudiante</a></li>
  <li><a href="#familiar" data-toggle="tab">3. Situacion familiar</a></li>
  <li><a href="#vacunas" data-toggle="tab">4. Vacunas estudiante</a></li>
  <li><a href="#actividades" data-toggle="tab">5. Actividades de interes</a></li>
  <li><a href="#enfermedades" data-toggle="tab">6. Enfermedades del estudiante</a></li>
  <li><a href="#diversidades" data-toggle="tab">7. Diversidades funcionales</a></li>
  <li><a href="#materias" data-toggle="tab">8. Materias repetidas</a></li>

</ul>      

<form method="get" action="../gestion/reinscrib.php" class="form-horizontal" id="inscripcion" name="inscripcion">

<div class="tab-content">
<div class="tab-pane active" id="padre">

<div class="container2">
	  <legend>  <h4>1. Datos del representante</h4></legend>
	   
	  <div class="form-group">
	  <label for="fecha" class="control-label">Estado Civil</label>
    <select id="civil" name="civil" class="form-control"><option>Soltero/a</option><option>Casado/a</option><option>Divorciado/a</option><option>Viudo/a</option><option>Separado/a</option></select>
	  </div>
    
    
    <legend> <h4>2. Datos de profesion</h4></legend>
        <div class="form-group">
                                          <label for="profesionr" class="control-label">Profesion</label><input name="profesionr" id="profesionr" value="<?php echo $resultado['profesion'];?>" type="text" class="form-control" onkeypress="return validar(event,this)"/>
	  </div>&nbsp;<div class="form-group"><label for="lugartr" class="control-label">Lugar de trabajo</label><input name="lugartr" id="lugartr" value="<?php echo $resultado['lugar_tr'];?>" type="text" class="form-control" onkeypress="return validar(event,this)"/>
	  </div>&nbsp;<div class="form-group"><label for="diretr" class="control-label">Direccion de trabajo</label><input name="diretr" id="diretr" value="<?php echo $resultado['dir_tra'];?>" type="text" class="form-control" onkeypress="return validar(event,this)"/>
	  </div>&nbsp;</br></br><label for="telefonor" class="control-label">Telefono de trabajo</label><div class="form-group">
<select name="codigo" id="codigo" class="form-control"><option value="0416">0416</option><option value="0426">0426</option><option value="0414">0414</option><option value="0424">0424</option><option value="0412">0412</option><option value="0235">0235</option>
</select></div>
<div class="form-group">
<input maxlength="7" name="telefonor" id="telefonor" type="text" pattern="\d*" value="<?php echo $resultado['tlf_tr'];?>" required class="form-control"/>
	  </div>
    
    
    <legend> <h4>3. Datos de contacto</h4></legend>
     <div class="form-group"><label for="direccr" class="control-label">Direccion</label>
   <input name="direccr" id="direccr" value="<?php echo $resultado['dir_rep'];?>" type="text" class="form-control" onkeypress="return validar(event,this)"/></div>
	  <label for="telrr" class="control-label">Tel&eacute;fono de Residencia</label>
<div class="form-group">
<select name="codigo2" id="codigo2" class="form-control"><option value="0235">0235</option><option value="0246">0246</option><option value="0238">0238</option><option value="0247">0247</option>
</select></div>
<div class="form-group">
<input maxlength="7" name="telrr" id="telrr" pattern="\d*" value="<?php echo $resultado['tlf_rep'];?>" required type="text" class="form-control"/>
      </div>

  <center>
  <input type="button" id="botonestu" name="botonestu" onclick="nextTab('#menu');" value="2. Datos del estudiante" class="btn btn-info">

    </center>
 </div>



</div>
<div class="tab-pane" id="estudiante">

<br>
    <legend><h4>1. Escolaridad</h4></legend><center>
<div class="form-group">
<div class="control-label">
<center>

  <label class=".radio-inline" id="anoestu">
	1er a&ntilde;o          <input required name="anoestu" type="radio" id="inline1" value="1"/>
</label>
  <label class=".radio-inline" id="anoestu">

	2do a&ntilde;o          <input required name="anoestu" type="radio" id="inline2" value="2"/> <br>
  </label><label class=".radio-inline" id="anoestu">

	3er a&ntilde;o          <input required name="anoestu" type="radio" id="inline3" value="3"/> <br>
 </label> <label class=".radio-inline" id="anoestu">

	4to a&ntilde;o          <input required name="anoestu" type="radio" id="inline4" value="4"/> <br>
 </label> <label class=".radio-inline" id="anoestu">

	5to a&ntilde;o          <input required name="anoestu" type="radio" id="inline5" value="5"/> <br>
</label>	
</center>
</div></div>

 <div class="form-group">

<select name="mencion" id="mencion" class="form-control" required>
				<option value=""></option>
				<option value="Ciencias">Ciencias</option>
				<option value="Humanidades">Humanidades</option>
				<option value="Contabilidad">Contabilidad</option>
			</select></div></center>

<legend><h4>2. Estudiante a reinscribir</h4></legend><center>
   <div class="form-group">
<select name="nacionn" id="nacionn" class="form-control"><option value="V-">V-</option><option value="E-">E-</option>
	</select> </div>
     
    <div class="form-group">
    <input name="cedulan" type="text" maxlength="9" class="form-control" value="<?php echo $resultado['ced_e'];?>" placeholder="Ej: 1111111" required/>
	</div>
	</center>

    <legend><h4>3. Informacion del estudiante y datos de contacto</h4></legend>

	<div class="form-group"><label for="diren" class="control-label">Direccion</label><input name="diren" id="diren" type="text" value="<?php echo $resultado['direccion'];?>" placeholder="Direccion" class="form-control" onkeypress="return validar(event,this)"/>
	</div>&nbsp;

<div class="form-group"><label for="telen" class="control-label">Telefono</label>

<select name="codigo3" id="codigo3" class="form-control"><option value="0416">0416</option><option value="0426">0426</option><option value="0414">0414</option><option value="0424">0424</option><option value="0412">0412</option><option value="0235">0235</option>
</select>
    <input maxlength="7" name="telen" id="telen" type="text" placeholder="Telefono" value="<?php echo $resultado['telefono'];?>" class="form-control"/></div>
<div class="form-group"><label for="telem" class="control-label">Telefono de emergencia</label>

<select name="codigo4" id="codigo4" class="form-control"><option value="0416">0416</option><option value="0426">0426</option><option value="0414">0414</option><option value="0424">0424</option><option value="0412">0412</option><option value="0235">0235</option>
</select>  
<input name="teleemer" id="teleemer" type="text" placeholder="Telefono en caso de Emergencia" value="<?php echo $resultado['tlf_res'];?>" maxlength="7"pattern="\*d" title="Solo numeros"  class="form-control"/></div>&nbsp; <div class="form-group"><label for="parentescor" class="control-label">Parentesco</label>
    
    <select id="parentescon" name="parentescon" class="form-control" value="<?php echo $resultado['parentesco'];?>" onkeypress="return validar(event,this)">
	<option>Padre</option>
	<option>Madre</option>
        <option>Hermano</option>
        <option>Tio</option>
        <option>Abuelo</option>
        <option>Primo</option>
        <option>Conocido</option>
	</select> </div>

   <center>
      <input type="button" onclick="prevTab('#menu');" value="1. Datos del representante" class="btn btn-info">
      <input type="button" id="botonfam" name="botonfam" onclick="nextTab('#menu');" value="3. Situacion Familiar" class="btn btn-info">
    </center>
</div>
<div class="tab-pane" id="familiar"><br />

<legend><h4>1. Entorno familiar</h4></legend><center>
	<label for="vivecon" class="control-label">Personas con los que vive:</label><br />
	  <div class="form-group">
	  <label class="checkbox-inline" id="vivecon">
	Padre Y/O madre <input name="Checkbox1" type="checkbox" id="inline1" value="Padre y/o Madre"/> <br></label>
	<label class="checkbox-inline" id="vivecon">Tio             <input name="Checkbox2" type="checkbox" id="inline2" value="Tio"/> <br></label>
	<label class="checkbox-inline" id="vivecon">Abuelo          <input name="Checkbox3" type="checkbox" id="inline3" value="Abuelo"/><br></label>
	<label class="checkbox-inline" id="vivecon">Primo           <input name="Checkbox4" type="checkbox" id="inline4" value="Primo"/><br></label>
	<label class="checkbox-inline" id="vivecon">Hermano         <input name="Checkbox5" type="checkbox" id="inline5" value="Hermano"/><br> </label>
	<label class="checkbox-inline" id="vivecon">Otro            <input name="Checkbox6" type="checkbox" id="inline6" value="Otro"/><br></label>
	
	</label></div></center>
	
	<div class="form-group">
	<label for="numper" class="control-label">Numero de personas que viven en el hogar:</label> 
    
	<input id="numper" name="numper" value="<?php echo $resultado['nu_pers'];?>" type="text" class="form-control"/></div>
	
     <div class="form-group">
	<label for="Tipoviv" class="control-label">Tipo de vivienda:</label> 
   
	<select name="Select1" id="tipoviv" class="form-control">
				<option>Apartamento</option>
				<option>Casa</option>
				<option>Finca</option>
				<option>Quinta lujosa</option>

			</select>
	</div>

<div class="form-group">
	
	<label for="numper" class="control-label">Monto de alquiler</label> 
  <div class="input-group">
     
 <input id="alq" name="alq" type="text" value="<?php echo $resultado['mont_al'];?>" class="form-control input-small"/>
  <span class="input-group-addon">Bsf</span>
</div></div>

<center>
	 <div class="form-group">
	<label for="serv" class="control-label">Servicios que posee:</label><br />
	  
	<label class="checkbox-inline" id="serviciosc">
	<label class="checkbox-inline" id="serviciosc">Agua    <input name="Checkbox9"  type="checkbox" id="inline1" value="agua"/> <br /></label>
	<label class="checkbox-inline" id="serviciosc">Cable   <input name="Checkbox10" type="checkbox" id="inline2" value="cable"/><br /></label>
	<label class="checkbox-inline" id="serviciosc">Telefono<input name="Checkbox11" type="checkbox" id="inline3" value="telefono"/> <br /></label>
	<label class="checkbox-inline" id="serviciosc">Internet<input name="Checkbox12" type="checkbox" id="inline4" value="Internet"/> <br /></label>
	<label class="checkbox-inline" id="serviciosc">Gas     <input name="Checkbox13" type="checkbox" id="inline5" value="Gas"/><br /></label>

	 </div></center>
	<div class="form-group">
	<label for="becaes" class="control-label">Posee beca el estudiante:</label>
    
    <label class="radio-inline" id="becaes">
    Si<input name="becaa" type="radio" id="becasi" value="si" checked>	</label>
    <label class="radio-inline" id="becaes">
No<input type="radio" name="becaa" id="becano" value="no">
	</label>
        </div> 
    
    <div class="form-group">
<label for="becaes" class="control-label">Que organismo se la otorga:</label>
   
	<input name="Text30" type="text" id="Text30" class="form-control"/>&nbsp; 
	</div>
    
    <div class="form-group">
	<label for="becaes" class="control-label">Ingreso familiar mensual:</label>
<select name="Select1" id="ingref" class="form-control">
				<option value="-3000">-3000</option>
				<option value="3000-6000">3000-6000</option>
				<option value="+6000">+6000</option>
			</select></div>

</br></br>
<center>
    <input type="button" onclick="prevTab('#menu');" value="2. Datos del estudiante" class="btn btn-info">
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="4. Vacunas" class="btn  btn-info"/></center>

</div>
<div class="tab-pane" id="vacunas">
<center>
     <legend> <h4>1. Datos de vacunacion</h4></legend>
 <div class="form-inline">
  <div class="checkbox">
<?php
require("../conexion.php");
$cons="Select cod_va,nom_va from `vacuna`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<center>';
echo '<h4>Vacunas habilitadas </h4>';
echo '</center">';
while($row=mysql_fetch_array($conss)){
echo '<label class="checkbox-inline">';
echo sprintf("<input name='vacu[]' id='vacu[]' type='checkbox' value='%s'>%s",$row["cod_va"],$row["nom_va"]);
echo '</label>';
}
}}if($d==0){
echo '<h4>No exiten Vacunas habilitadas </h4>';
mysql_query("rollback");}
?> 
 </div></div><br>

<center>
    <input type="button" onclick="prevTab('#menu');" value="3. Situacion Familiar" class="btn btn-info">
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="5. Actividades de interes" class="btn  btn-info"/></center> 
</div>

<div class="tab-pane" id="actividades">
<center>
<legend> <h4>1. Actividades de interes</h4></legend>
 <div class="form-group">
  <div class="checkbox">
<?php
require("../conexion.php");
$cons="Select cod_hab,tipo_hab from `habilidad`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Actividades habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<label class="checkbox-inline pull-left">';
echo sprintf("<input name='habi[]' id='habi' type='checkbox' value='%s'>%s",$row["cod_hab"],$row["tipo_hab"]);
echo '&nbsp;&nbsp;</label>';
echo 'Observaciones:<input name="obser[]" id="obser" type="text" class="col-xs-2 form-control"><br>';
}
}}if($d==0){
echo '<h4>No exiten actividades habilitadas </h4>';
mysql_query("rollback");}
?>    
   </div></div><br>

</center>        
<center><input name="Button1" id="botonvacu" name="botonvacu" type="button" onclick="prevTab('#menu');" value="4. Vacunas del estudiante" class="btn  btn-info"/>
    <input type="button" onclick="nextTab('#menu');" value="6. Enfermedades del estudiante" class="btn btn-info"></center>
    
    </div>
<div class="tab-pane" id="enfermedades">
    <center>
<legend> <h4>1. Enfermedades presentadas por el estudiante</h4></legend>
 <div class="form-inline">
  <div class="checkbox">
       <?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select cod_enf,tipo_enf from `enfermedad`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Enfermedades habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<div class="form-group">';
echo '<label class="checkbox-inline">';
echo "<input name='enfer[]' id='enfer' type='checkbox' value='".$row["cod_enf"]."'></td><td>".$row["tipo_enf"]."";
echo '</label>';
echo '</div>';
}
}}if($d==0){
echo '<h4>No exiten enfermedades habilitadas </h4>';
mysql_query("rollback");}
?>  
       </div></div>  

</center>   <br><br> 
<center>
    <input type="button" onclick="prevTab('#menu');" value="5. Actividades de interes" class="btn btn-info">
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="7. Diversidades funcionales" class="btn  btn-info"/></center>
 
 
</div>
<div class="tab-pane" id="diversidades">
<center>
<legend> <h4>1. Diversidades presentadas por el estudiante</h4></legend>
 <div class="form-inline">
  <div class="checkbox">
<?php
require("../conexion.php");
$cons="Select cod_div,nom_div from `diversidad_fun`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Diversidades funcionales habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<label class="checkbox-inline">';
echo "<td><input name='fun[]' id='fun' type='checkbox' value='".$row["cod_div"]."'></td><td>".$row["nom_div"]."</td>";
echo '</label>';}
}}if($d==0){
echo '<h4>No exiten diversidades habilitadas </h4>';
mysql_query("rollback");}
?> 
     </div></div><br>

</center>  


<center><input name="Button1" type="button" onclick="prevTab('#menu');" value="6. Diversidades funcionales" class="btn  btn-info"/>
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="8. Materias repetidas" class="btn  btn-info" class="form-control"/>
    </center>
    </div>

<div class="tab-pane" id="materias">
<center>
<legend> <h4>1. Materias pendientes ligadas al alumno</h4></legend>
 <div class="form-inline">
  <div class="checkbox">

<?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$cons="Select * from `materia`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Selecciona materias repetidas</h4>';
while($row=mysql_fetch_array($conss)){
echo '<label class="checkbox-inline">';
echo "<td><input name='mate[]' id='mate' type='checkbox' value=".$row['cod_mat']."></td><td>".'Materia: '.$row['nom_mat']." </td>";
echo '</label>';
}
}}if($d==0){
echo '<h4>No exiten materias </h4>';
mysql_query("rollback");}
?>    
 
</div></div><br>

</center>  

<center><input name="Button1" type="button" onclick="prevTab('#menu');"  value="7. Diversidades funcionales" class="btn  btn-info"/>
    <input name="Button1" type="submit" data-toggle="tab" value="Inscribir" class="btn  btn-success" class="form-control"/>
    </center>
</div>

</div>


</form>
   
</div><?php require('../footer.html'); ?></div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="../dist/js/bootstrap-formhelpers.js"></script>
<script src="../dist/validar/jquery.validate.min.js"></script>
    <script>
  $(function () {
    $('#menu a:first').tab('show')
  })
</script>


<script type="text/javascript">

    jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç 0-9]+$/);
    }, "No se permiten simbolos.");

    jQuery.validator.addMethod("letras", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç]+$/);
    }, "Solo letras.");

    $(document).ready(function () {

        $('#inscripcion').validate(
         {

             errorClass: 'form-control-error',
             validClass: 'form-control-sucess',
              ignore: "",

              submitHandler: function (form) {

                if ($("#inscripcion").valid() == true) { alert("Fallo el error"); } else {form.submit();  }
         
            },

             rules: {
               
                 nombrer: {
                     minlength: 2,
                     letras: true,
                     required: true
                 },
                 apellidor: {
                     minlength: 2,
                     required: true
                 },
                 cedular: {
                     minlength: 7,
                     number: true,
                     required: true
                 },
                 edadr: {
                     minlength: 2,
                     number: true,
                     required: true
                 },
                 parentescor: {

                     required: true
                 },
                 niveledur: {
                     required: true
                 },
                 profesionr: {
                     letras: true,
                     required: true
                 },
                 lugartr: {
                     alpha: true,
                     minlength: 2,
                     required: true
                 },
                 diretr: {
                     alpha: true,
                     minlength: 2,
                     required: true
                 },
                 telefonor: {
                     minlength: 7,
                     number: true,
                     required: true
                 },
                 direccr: {
                     alpha: true,
                     minlength: 2,
                     required: true
                 },
                 telrr: {
                     minlength: 7,
                     number: true,
                     required: true
                 },

                 nombren: { minlength: 2,
                     letras: true,
                     required: true
                 },
                 apen: { minlength: 2,
                     letras: true,
                     required: true
                 },

                 cedulan: {
                     minlength: 7,
                     number: true,
                     required: true
                 },

                 nacn: { required: true },
                 lugar: {
                     minlength: 2,
                     letras: true,
                     required: true
                 },
                 diren: { minlength: 2,
                     alpha: true,
                     required: true
                 },
                 telen: { minlength: 7,
                     number: true,
                     required: true
                 },
                 teleemer: { minlength: 7,
                     number: true,
                     required: true
                 },
                 respons: { minlength: 2,
                     letras: true,
                     required: true
                 },
                 
                 instprocn: { minlength: 2,
                     alpha: true,
                     required: true
                 },
                 inscerca: { minlength: 2,
                     alpha: true,
                     required: true
                 },

                 numper: { required: true, number: true },
                 alq: { required: true, number: true },
                 Text30: { required: true, alpha: true }


             },

             highlight: function (element) {
                 $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
             },

             success: function (element) {
                 $(element).closest('.form-group').removeClass('has-error').addClass('has-success');

             }




         });

    }); // end document.ready

</script>
     </body>
</html>
