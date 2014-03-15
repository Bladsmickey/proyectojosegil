
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Inscripcion</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <link href="../dist/css/bootstrap-form-helpers.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
        

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

    function modificarEstado() {
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

</script>

<?php
	// debes cambiar por tus datos de acceso a MySQL.
	$link = mysql_connect("localhost", "root", "", true);
	// debes cambiar "test" por el nombre de tu base de datos en MySQL.
	mysql_select_db("paises", $link);
	mysql_query("SET NAMES UTF8",$link);	
	$sql = "SELECT * FROM `estados` ORDER BY `estados`";
	$sql2 = "SELECT * FROM `ciudades` ORDER BY `ciudad`";
	$estados = mysql_query($sql,$link);
	$estados2=mysql_query($sql2,$link);
?>

<script src="../jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(
	function () {
		$("#ciudad2").load("makeselect2.php?pais="+$("#estado2").val());
		$("#estado2").change(
			function () {
				$("#ciudad2").load("makeselect2.php?pais="+$("#estado2").val());
			}
		);
	}
);

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

  </head>

  <body>

    <!-- Wrap all page content here -->


      <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">


  <ul class="nav nav-tabs nav-justified" id="menu">
  <li class="active" ><a href="#padre" data-toggle="tab">1. Datos del Representante legal</a></li>
  <li><a href="#estudiante" data-toggle="tab">2. Datos personales estudiantiles</a></li>
  <li><a href="#familiar" data-toggle="tab">3. Situacion familiar</a></li>
  <li><a href="#vacunas" data-toggle="tab">4. Vacunas del estudiante</a></li>
  <li><a href="#actividades" data-toggle="tab">5. Actividades de interes</a></li>
  <li><a href="#enfermedades" data-toggle="tab">6. Enfermedades del estudiante</a></li>
  <li><a href="#diversidades" data-toggle="tab">7. Diversidades funcionales</a></li>
</ul>      

<form method="post" action="inscrib.php" name="inscripcion" id="inscripcion" class="form-group">

<div class="tab-content">
<div class="tab-pane active" id="padre">

<div class="container2">

  

    
  
    <legend>  <h4>1. Datos del representante</h4></legend> 

<div class="form-horizontal">

<div class="col-lg-2 col-sm-2">
<label class="control-label" for="apellidor">C.I.N.V</label>
</div>
<div class="col-lg-3 col-sm-3">
 <div class="form-group">
<select name="nacion" id="nacion" class="form-control" data-toggle="tooltip" title="Venezolano u Extranjero">
<option value="V-">V-</option>
<option value="E-">E-</option>
</select>
</div></div>

<div class="col-lg-7 col-sm-7">
 <div class="form-group">
<input name="cedular" type="text" data-toggle="tooltip" title="Solo numeros" maxlength="8" class="form-control" placeholder="Ej: 1111111" required/>
    </div></div></div>
  
<div class="form-horizontal">


<div class="col-lg-2 col-sm-2">  
  <label class="control-label" for="nombrer">Nombres</label> 
</div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">
      
    <input type="text" name="nombrer" class="form-control" id="nombrer" onkeypress="return validar(event,this)" data-toggle="tooltip" title="Ejemplo: Rita Guillermo">
     </div></div>

<div class="col-lg-2 col-sm-2">
    <label class="control-label" for="apellidor">Apellidos</label>
</div>

<div class="col-lg-4 col-sm-4">
 <div class="form-group"> 


     <input type="text" name="apellidor" class="form-control" id="apellidor" data-toggle="tooltip" title="Ejemplo: Avila Ruiz" onkeypress="return validar(event,this)">
    
   </div></div>

</div>

<div class="form-horzontal">

<div class="col-lg-2 col-sm-2">
<label for="sexor" class="control-label">Sexo</label>
</div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">
   <select id="sexor" name="sexor" class="form-control" required>
	<option value="Masculino">Masculino</option>
	<option value="Femenino">Femenino</option>   
	</select> </div></div>

<div class="col-lg-2 col-sm-2">
  <label for="fecha" class="control-label">Estado Civil</label>
</div>

<div class="col-lg-4 col-sm-4">
 <div class="form-group">
   <select id="civil" name="civil" class="form-control"><option>Soltero/a</option><option>Casado/a</option><option>Divorciado/a</option><option>Viudo/a</option><option>Separado/a</option></select>
	  </div></div>

</div>
    
    <div class="form-group">
    <label for="nacn" class="control-label">Fecha de nacimiento
        <div class="bfh-datepicker" id="fechas" data-name="nacnp" data-toggle="tooltip" title="No se aceptan fechas mayores a la actual" data-format="d/m/y" data-max="today" close="true"></div></label>
  </div>


<div class="form-horizontal">

<div class="col-lg-2 col-sm-2">
<label for="parentescor" class="control-label">Parentesco</label>
</div>

<div class="col-lg-4 col-sm-4">
     <div class="form-group">
   
    <select id="parentescor" name="parentescor" class="form-control">
	<option>Padre</option>
	<option>Madre</option>
        <option>Hermano</option>
        <option>Tio</option>
        <option>Abuelo</option>
        <option>Primo</option>
        <option>Conocido</option>
	</select> </div></div>
    

<div class="col-lg-3 col-sm-3">
<label for="Niveledur" class="control-label">Nivel educacional</label> 
</div>

<div class="col-lg-3 col-sm-3">
<div class="form-group">
<select id="niveledur" name="niveledur" class="form-control">
<option>No posee</option>
<option>Basica</option>
<option>Media</option>
<option>Diversificada</option>
<option>Superior</option>
</select>
	  </div></div>

</div>
    
    <legend> <h4>2. Datos de profesion</h4></legend> 
<div class="form-horizontal">
<div class="col-lg-2 col-sm-2">
<label for="profesionr" class="control-label">Profesion</label>
</div>

<div class="col-lg-4 col-sm-4">
    <div class="form-group">
<input name="profesionr"  id="profesionr" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" title="Solo caracteres" required type="text" class="form-control" onkeypress="return validar(event,this)"/>
	  </div>  </div>
<div class="col-lg-2 col-sm-2">
<label for="lugartr" class="control-label">Lugar de trabajo</label>
</div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">
<input name="lugartr" id="lugartr" type="text" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" data-toggle="tooltip" title="Nombre de la empresa o lugar de trabajo" required class="form-control" onkeypress="return validar(event,this)"/>
	  </div></div>
</div>

<div class="form-group"><label for="diretr" class="control-label">Direccion de trabajo</label><input name="diretr" id="diretr" type="text" data-toggle="tooltip" title="Direccion del empleo" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$"  required class="form-control" onkeypress="return validar(event,this)"/>
	  </div>&nbsp; 
  
<center>
<label for="telefonor" class="control-label">Telefono de trabajo</label>
<div class="form-inline">
<div class="form-group">
<select name="codigo" id="codigo" class="form-control">
<option value="0416">0416</option>
<option value="0426">0426</option>
<option value="0414">0414</option>
<option value="0424">0424</option>
<option value="0412">0412</option>
<option value="0235">0235</option>
</select></div>
<div class="form-group">
<input maxlength="7" name="telefonor" id="telefonor" type="text" pattern="\d*" required class="form-control"/>
	  </div></div></center>
    <legend> <h4>3. Datos de contacto</h4></legend> 
    
    <div class="form-group"><label for="direccr" class="control-label">Direccion de residencia</label><input name="direccr" id="direccr" pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" data-toggle="tooltip" title="Direccion de vivienda" title="Estas ingresando simbolos" required type="text" class="form-control" onkeypress="return validar(event,this)"/>
	  </div>

<center>
<label for="telrr" class="control-label">Tel&eacute;fono de Residencia</label>
<div class="form-inline">
<div class="form-group">
<select name="codigo2" id="codigo2" class="form-control"><option value="0235">0235</option><option value="0246">0246</option><option value="0238">0238</option><option value="0247">0247</option>
</select></div>
<div class="form-group">
<input maxlength="7" name="telrr" id="telrr" pattern="\d*"  required type="text" class="form-control"/>
      </div>  </div> 
 
</center>

<br>
    
    <center>
  <input type="button" id="botonestu" name="botonestu" onclick="nextTab('#menu');" value="2. Datos del estudiante" class="btn btn-info">

    </center>
 

</div>



</div>
<div class="tab-pane" id="estudiante">

 
<legend><h4>1. Escolaridad</h4></legend><center>
    <div class="form-group">
<div class="control-label" data-toggle="tooltip" title="Seleccione escolaridad">


  <label class=".radio-inline" id="anoestu">
	1er a&ntilde;o          <input name="anoestu" type="radio" id="inline1" value="1"/>
</label>
  <label class=".radio-inline" id="anoestu">

	2do a&ntilde;o          <input name="anoestu" type="radio" id="inline2" value="2"/>  
  </label><label class=".radio-inline" id="anoestu">

	3er a&ntilde;o          <input name="anoestu" type="radio" id="inline3" value="3"/>  
 </label> <label class=".radio-inline" id="anoestu">

	4to a&ntilde;o          <input name="anoestu" type="radio" id="inline4" value="4"/>  
 </label> <label class=".radio-inline" id="anoestu">

	5to a&ntilde;o          <input name="anoestu" type="radio" id="inline5" value="5"/>  
</label>	

</div></div>   
            <div class="form-group">

<select name="mencion" id="mencion" class="form-control" data-toggle="tooltip" title="Seleccione mencion del estudiante">
				<option value="">Mencion</option>
				<option value="Ciencias">Ciencias</option>
				<option value="Humanidades">Humanidades</option>
				<option value="Contabilidad">Contabilidad</option>
			</select>


</div>  </center>

    
       <legend> <h4>2. Datos del estudiante</h4></legend>  

<div class="form-horizontal">
<div class="col-lg-6 col-sm-6">
<div class="form-group"><label for="nombren" class="control-label">Nombres</label>
    <input name="nombren" id="nombren" data-toggle="tooltip" title="Juan Carlos"  type="text" class="form-control" onkeypress="return validar(event,this)"/>
</div></div>

<div class="col-lg-6 col-sm-6">
     <div class="form-group">
<label class="control-label" for="apellidon">Apellidos</label>
<input name="apen" id="apen"  class="form-control" data-toggle="tooltip" title="Garcia Avila" type="text" onkeypress="return validar(event,this)" />
</div>
</div>
</div>
     
<br>

<div class="form-horizontal">

<div class="col-lg-4 col-sm-4">
<label class="sr-only" for="cedulan">C.I.N.V</label>
 <div class="form-group">
<select name="nacionn" id="nacionn" class="form-control" data-toggle="tooltip" title="Venezolano u Extranjero">
<option value="V-">V-</option>
<option value="E-">E-</option>
	</select> 
</div></div>


<div class="col-lg-8 col-sm-8">
<label class="sr-only" for="cedulan"></label>
        <div class="form-group">
    <input name="cedulan" id="cedulan" type="text" data-toggle="tooltip" title="Solo numeros" maxlength="8" class="form-control" placeholder="Ej: 11222333"/>
	</div>  </div> 
</div>



<div class="form-group">
<label for="sexon" class="control-label">Sexo</label> 

	  
	<select name="sexon" id="sexon" class="form-control">
	<option value="Masculino">Masculino</option>
	<option value="Femenino">Femenino</option>
	</select>

</div>


    <div class="form-group" data-toggle="tooltip" title="No se permiten fechas mayores a la actual">
    <label for="nacn" class="control-label">Fecha de nacimiento</label>
    <div class="bfh-datepicker" data-toggle="show" data-name="nacn" data-format="d/m/y" data-max="today"></div></div>



<div class="form-horizontal">

<div class="col-lg-4 col-sm-4">
<div class="form-group">
    <label for="lugar" class="control-label">Parroquia</label>
    <input name="lugar" id="lugar" type="text" placeholder="Lugar de nacimiento" class="form-control" onkeypress="return validar(event,this)"/>
</div></div>
<div class="col-lg-4 col-sm-4">
    <div class="form-group">
    <label for="lugar" class="control-label">Estado</label>  
    
    <select name="estado2" id="estado2" class="form-control">
    <?php
	while ($fila = mysql_fetch_assoc($estados)) {
		echo sprintf('<option value="%s">%s</option>',$fila['idestados'],$fila['estados']);
	}
?>
  </select>
    </div></div>
<div class="col-lg-4 col-sm-4">
<div class="form-group">
          <label for="lugar" class="control-label">Ciudad</label>  <select name="ciudad2" id="ciudad2" class="form-control">
    <?php
	while ($fila2 = mysql_fetch_assoc($estados2)) {
		echo sprintf('<option value="%s">%s</option>',$fila2['idestado'],$fila2['ciudad']);
	}
?>
  </select>
      </div></div> 

 </div> 

	
    <legend> <h4>3. Datos de contacto</h4></legend> 
 <div class="form-group">
    <label for="diren" class="control-label">Direccion</label>
   <input name="diren" id="diren" type="text" placeholder="Direccion" data-toggle="tooltip" title="Vivienda del estudiante" class="form-control" onkeypress="return validar(event,this)"/></div>
	

<div class="form-horizontal">

<div class="col-lg-4 col-sm-4">
<label for="telen" class="control-label">Telefono</label>
</div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">
<select name="codigo3" id="codigo3" class="form-control">
<option value="0416">0416</option>
<option value="0426">0426</option>
<option value="0414">0414</option>
<option value="0424">0424</option>
<option value="0412">0412</option>
<option value="0235">0235</option>
</select></div></div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">

 <input maxlength="7" name="telen" id="telen" type="text" placeholder="Telefono" class="form-control"/></div>
</div></div>


	 
<div class="form-horizontal">


<div class="col-lg-4 col-sm-4">
<label for="telen" class="control-label">Telefono de emergencia</label>
</div>

<div class="col-lg-4 col-sm-4">
<div class="form-group">
<select name="codigo4" id="codigo4" class="form-control">
<option value="0416">0416</option>
<option value="0426">0426</option>
<option value="0414">0414</option>
<option value="0424">0424</option>
<option value="0412">0412</option>
<option value="0235">0235</option>
</select></div></div>   

<div class="col-lg-4 col-sm-4">
<div class="form-group">
<input name="teleemer" id="teleemer" type="text" data-toggle="tooltip" title="Telefono en caso de Emergencia" maxlength="7"pattern="\*d" title="Solo numeros"  class="form-control"/>
</div>
     </div></div>
     
<div class="form-group"><label for="respons" class="control-label">Responsable</label>
   <input name="respons" id="respons" type="text"  data-toggle="tooltip" title="Reponsable del telefono de emergencias" class="form-control" onkeypress="return validar(event,this)"/></div>
	<div class="form-group"><label for="parentescor" class="control-label">Parentesco</label>
    
    <select id="parentescor" name="parentescor" class="form-control">
	<option>Padre</option>
	<option>Madre</option>
        <option>Hermano</option>
        <option>Tio</option>
        <option>Abuelo</option>
        <option>Primo</option>
        <option>Conocido</option>
	</select> </div>
	<div class="form-group"><label for="instprocn" class="control-label">Institucion de procedencia</label>
    <input name="instprocn" id="instprocn" type="text" data-toggle="tooltip" title="Institucion previa del estudiante" placeholder="Institucion de procedencia" class="form-control" onkeypress="return validar(event,this)"/></div>
	<div class="form-group"><label for="inscerca" class="control-label">Instituciones educativas cercanas a la vivienda</label><input name="inscerca" data-toggle="tooltip" title="Instituciones cercanas a la vivienda del estudiante"  id="inscerca" type="text" placeholder="Instituciones cercanas a la vivienda"  class="form-control" onkeypress="return validar(event,this)"/></div><br /><br />

<center>
      <input type="button" onclick="prevTab('#menu');" value="1. Datos del representante" class="btn btn-info">
      <input type="button" id="botonfam" name="botonfam" onclick="nextTab('#menu');" value="3. Situacion Familiar" class="btn btn-info">
    </center>
    
</div>


<div class="tab-pane" id="familiar"><br />
     <legend> <h4>1. Datos del entorno familiar</h4></legend> 
<center>
	<label for="vivecon" class="control-label">Personas con los que vive:</label><br />
<div class="form-group" data-toggle="tooltip" title="Personas que integran el grupo familiar">
	  <label class="checkbox-inline" id="vivecon">
	Padre Y/O madre <input name="Checkbox1" type="checkbox" id="inlinea" value="Padre y/o Madre"/><br> </label>
          <label class="checkbox-inline" id="vivecon">	
Tio             <input name="Checkbox2" type="checkbox" id="inlineb" value="Tio"/> <br></label>
<label class="checkbox-inline" id="vivecon">		
Abuelo          <input name="Checkbox3" type="checkbox" id="inlinec" value="Abuelo"/> <br></label>
<label class="checkbox-inline" id="vivecon">	
Primo           <input name="Checkbox4" type="checkbox" id="inlined" value="Primo"/> <br></label>
<label class="checkbox-inline" id="vivecon">	
Hermano         <input name="Checkbox5" type="checkbox" id="inlinee" value="Hermano"/> <br></label>
<label class="checkbox-inline" id="vivecon">	
Otro            <input name="Checkbox6" type="checkbox" id="inlinef" value="Otro"/><br> </label>
	</div>
	
</center> 
	
	<div class="form-group">
        
	<label for="numper" class="control-label">Numero de personas que viven en el hogar:</label>
     
	<input id="numper" name="numper" type="text" data-toggle="tooltip" title="Cantidad de personas que integran el grupo familiar" pattern="\d*" title="Solo numeros" class="form-control"/>
	</div>
	
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
     
 <input id="alq" name="alq" data-toggle="tooltip" title="En caso de ser propio omitir" type="text" class="form-control input-small" value="0"/>
  <span class="input-group-addon">Bsf</span>
</div></div>

<center>
	<label for="serv" class="control-label">Servicios que posee:</label><br />
	  
<div class="form-group">
	<label class="checkbox-inline" id="serviciosc">
	Agua    <input name="Checkbox9"  type="checkbox" id="inlinea" value="agua"/> <br /></label>
<label class="checkbox-inline" id="serviciosc">
	Cable   <input name="Checkbox10" type="checkbox" id="inlineb" value="cable"/><br /></label>
<label class="checkbox-inline" id="serviciosc">
	Telefono<input name="Checkbox11" type="checkbox" id="inlinec" value="telefono"/> <br /></label>
<label class="checkbox-inline" id="serviciosc">
	Internet<input name="Checkbox12" type="checkbox" id="inlined" value="Internet"/> <br /></label>
<label class="checkbox-inline" id="serviciosc">
	Gas     <input name="Checkbox13" type="checkbox" id="inlinee" value="Gas"/><br /></label>

	</div>
</center>
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

	<input name="Text30" type="text" id="Text30" data-toggle="tooltip" title="Organismo que otorga la beca" class="form-control"/>
	
</div>
    
    <div class="form-group">
	<label for="becaes" class="control-label">Ingreso familiar mensual:</label>

	
<select name="Select1" id="ingref" class="form-control" data-toggle="tooltip" title="Ingreso familiar mensual">
				<option value="-3000"> Menos de 3000 Bs</option>
				<option value="3000-6000">Entre 3000 y 6000 Bs</option>
				<option value="+6000">Mas de 6000 Bs</option>
			</select>

</div>

    

<center>
    <input type="button" onclick="prevTab('#menu');" value="2. Datos del estudiante" class="btn btn-info">
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="4. Vacunas" class="btn  btn-info"/></center>

</div>

<div class="tab-pane" id="vacunas">
<center>
     <legend> <h4>1. Datos de vacunacion</h4></legend>
 <div class="form-horizontal">
  <div class="checkbox">
<?php

echo '<center>';
echo '<h4>Vacunas habilitadas </h4>';
echo '</center">';
echo '<br>';
require("../conexion.php");
$cons="Select cod_va,nom_va from `vacuna`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");

while($row=mysql_fetch_array($conss)){
echo '<div class="col-lg-3 col-sm-3">';
echo '<div class="form-group">';
echo '<label class="checkbox-inline">';echo $row["nom_va"]; echo' ';
echo sprintf("<input name='vacu[]' id='vacu[]' type='checkbox' value='%s'>",$row["cod_va"]);
echo '</label>';
echo '
</div>';echo '
</div>';
}
}}if($d==0){
echo '<h4>No exiten Vacunas habilitadas </h4>';
mysql_query("rollback");}
?> 
 </div></div>  <br><br>

</center>
    <center>
    <input type="button" onclick="prevTab('#menu');" value="3. Situacion Familiar" class="btn btn-info">
    <input name="Button1" type="button" onclick="nextTab('#menu');" value="5. Actividades de interes" class="btn  btn-info"/></center>   
    
</div>

<div class="tab-pane" id="actividades">
<center>
<legend> <h4>1. Actividades de interes</h4></legend></center>   
 <div class="form-group pull-left">
  <div class="checkbox-inline">
<?php
require("../conexion.php");
$cons="Select cod_hab,tipo_hab from `habilidad`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo'<center>';
echo '<h4>Actividades habilitadas </h4>';
echo'</center><br>';
while($row=mysql_fetch_array($conss)){
  echo '<div class="col-lg-4 col-sm-4">';
echo '<label class="checkbox-inline">';
echo sprintf("<input name='habi[]' id='habi' type='checkbox' value='%s'>%s",$row["cod_hab"],$row["tipo_hab"]);

echo ' Observaciones:<input name="obser[]" id="obser" type="text" class="form-control">';
echo '</label>';
echo '</div>';
}
}}if($d==0){
echo '<h4>No exiten actividades habilitadas </h4>';
mysql_query("rollback");}
?>    
   </div></div>  
    <br><br>

<center><input name="Button1" id="botonvacu" name="botonvacu" type="button" onclick="prevTab('#menu');" value="4. Vacunas del estudiante" class="btn  btn-info"/>
    <input type="button" onclick="nextTab('#menu');" value="6. Enfermedades del estudiante" class="btn btn-info"></center>
    
       
    
</div>
<div class="tab-pane" id="enfermedades">
    <center>
<legend> <h4>1. Enfermedades presentadas por el estudiante</h4></legend>
 <div class="form-horizontal">
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
echo '<center>';
echo '<h4>Enfermedades habilitadas </h4>';
echo '</center><br>';
while($row=mysql_fetch_array($conss)){
  echo '<div class="col-lg-3 col-sm-3">';
echo '<div class="form-group">';
echo '<label class="checkbox">';
echo "<input name='enfer[]' class='checkbox' id='enfer' type='checkbox' value='".$row["cod_enf"]."'></td><td>".$row["tipo_enf"]."";
echo '</label>';
echo '</div>';echo '</div>';
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

<legend> <h4>1. diversidades presentadas por el estudiante</h4></legend>
 <div class="form-horizontal">
  <div class="checkbox">
<?php
require("../conexion.php");
$cons="Select cod_div,nom_div from `diversidad_fun`";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<center>';
echo '<h4>Diversidades funcionales habilitadas </h4>';
echo '</center><br>';
while($row=mysql_fetch_array($conss)){
    echo '<div class="col-lg-3 col-sm-3">';
echo '<div class="form-group">';
echo '<label class="checkbox">';
echo "<td><input name='fun[]' id='fun' type='checkbox' value='".$row["cod_div"]."'></td><td>".$row["nom_div"]."</td>";
echo '</label>';
echo '</div>';echo '</div>';
}
}}if($d==0){
echo '<h4>No exiten diversidades habilitadas </h4>';
mysql_query("rollback");}
?> 
     </div></div>  

</center>  
<br><br>
<center><input name="Button1" type="button" onclick="prevTab('#menu');" value="6. Diversidades funcionales" class="btn  btn-info"/>
    <input name="Button1" type="submit" value="Finalizar inscripcion" class="btn  btn-success" class="form-control"/>
    </center>

    </div>
</div>
</form>

</div>
    <?php require('../footer.html'); ?>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
  $(function () {
    $('#menu a:first').tab('show')
  })
</script>

<script src="../dist/js/bootstrap-formhelpers.js"></script>
<script src="../dist/validar/jquery.validate.min.js"></script>




<script type="text/javascript">


    jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç 0-9]+$/);
    }, "No se permiten simbolos.");

    jQuery.validator.addMethod("letras", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç]+$/);
    }, "Solo letras.");


    $(document).ready(function () {

        $('#fechas').bfhdatepicker('toggle');

        $('#inscripcion').validate(
         {

             errorClass: 'form-control-error',
             validClass: 'form-control-sucess',
              ignore: "",

              submitHandler: function (form) {

                if ($("#inscripcion").valid() == false) { alert("Fallo el error"); } else {form.submit();  }
         
            },

             rules: {
               
                 nombrer: {
                     minlength: 2,
                     letras: true,
                     required: true
                 },
                 apellidor: {
                     minlength: 2,
                     letras: true,
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

                 nacn: { 
                 required: true,
                 },
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
                 parentescon: { minlength: 2,
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
