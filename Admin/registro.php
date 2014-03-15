
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Registro</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    
        <link href="../dist/css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script language="JavaScript" type="text/JavaScript">
function check(input) {
if (input.value != document.getElementById('pass').value) {
        alert('Contraseñas no coinciden.');
    } else {
        input.setCustomValidity('');
    }
  }
</script>

<script language="JavaScript" type="text/JavaScript">
window.onload = function () {
    document.getElementById("vacun").onclick = modificarEstado;
    document.getElementById("vacn").onclick = modificarEstado;
}
function modificarEstado(){

    if (document.getElementById("vacun").checked) {
        document.getElementById("correo2").disabled = false;
    }

    if (document.getElementById("vacn").checked) {
        document.getElementById("correo2").disabled = true;
    }
}
</script>

  </head>

  <body>
        <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">


      <form class="form-horizontal" id="form2" name="form2" method="get" action="enviar.php">
        <legend><h4>Completa los campos a continuacion</h4></legend>
  
<div class="col-lg-3 col-sm-3">
  <label class="control-label">Nombres</label>
</div>

<div class="col-lg-3 col-sm-3">
<div class="form-group">
<input type="text" name="nombre" class="form-control" placeholder="Nombres" required="required" autofocus>
</div></div>

<div class="col-lg-3 col-sm-3">
  <label class="control-label">Apellidos</label>
</div>

<div class="col-lg-3 col-sm-3">
<div class="form-group">
<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required="required">
</div>
</div>

<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">C.I.N.V</label>
</div>
<div class="col-lg-3 col-sm-3">
 <div class="form-group">
<select name="nacio" id="nacio" class="form-control" data-toggle="tooltip" title="Venezolano u Extranjero">
<option value="V-">V-</option>
<option value="E-">E-</option>
</select>
</div></div>

<div class="col-lg-6 col-sm-6">
 <div class="form-group">
<input name="cedula" type="text" data-toggle="tooltip" title="Solo numeros" maxlength="8" class="form-control" placeholder="Ej: 1111111" required/>
    </div></div>


<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">Correo-e</label>
</div>
<div class="col-lg-9 col-sm-9">
<div class="form-group">
<input type="email" pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" data-toggle="tooltip" title="Ingrese una direccion valida" name="correo" class="form-control" placeholder="correo@dominio.com"required="required">
</div>
</div>

<div class="col-lg-4 col-sm-4">
<label class="control-label" for="apellidor">Posee correo alternativo?</label>
</div>

<div class="col-lg-2 col-sm-2">
<label class="radio-inline" id="vacuna">Si<input name="vacu" type="radio" id="vacun" value="si" checked>	</label><label class="radio-inline" id="vacuna">No<input type="radio" name="vacu" id="vacn" value="no"></label>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<input type="email" name="correo2" pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" placeholder="ingrese correo alternativo" data-toggle="tooltip" title="Ingrese una direccion valida" id="correo2" class="form-control" placeholder="Correo alternativo"required="required"></div></div>


<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">Nombre de usuario</label>
</div>
<div class="col-lg-9 col-sm-9">
<div class="form-group">
<input type="text" name="usuario" pattern="|^([a-zA-ZñÑáéíóúüç0-9_]+\s*)+$" class="form-control" data-toggle="tooltip" title="Ejemplo: juan_pepito12" placeholder="Usuario" required="required"></div>
</div>

<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">Contraseña</label>
</div>

<div class="col-lg-3 col-sm-3">
<div class="form-group">
<input type="password"  name="pass" maxlength="30" id="pass" class="form-control" placeholder="Contraseña" required="required"></div></div>

<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">Confirmar contraseña</label>
</div>
<div class="col-lg-3 col-sm-3">
<div class="form-group">
<input type="password" name="pass2" maxlength="30" id="pass2" class="form-control" placeholder="Reingrese contraseña" required="required" data-toggle="tooltip" title="Confirme su contraseña" onchange="check(this)">
</div></div>


<div class="col-lg-3 col-sm-3">
<label class="control-label" for="apellidor">Nivel de usuario</label>
</div>
<div class="col-lg-9 col-sm-9">
<div class="form-group">
 <select name="Select2" class="form-control" required="required" data-toggle="tooltip" title="Tipo de usuario">
	<option value="">Nivel de Usuario</option>
	<option value="Coordinador">Coordinador</option>
	<option value="Secretaria">Secretaria</option>
        </select>
        </div></div>

        <center><button class="btn btn-primary" type="submit">Completar Registro</button></center>
      </form>



    </div> <!-- /container -->
    
<?php require('../footer.html') ?>
</div>


<script src="../dist/validar/jquery.validate.min.js"></script>

  <script type="text/javascript">


  jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç 0-9]+$/);
    }, "No se permiten simbolos.");

    jQuery.validator.addMethod("letras", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ñÑáéíóúüç]+$/);
    }, "Solo letras.");


    $(document).ready(function () {

        $('#form2').validate(
         {

             errorClass: 'form-control-error',
             validClass: 'form-control-sucess',
              ignore: "",

              submitHandler: function (form) {

                if ($("#form2").valid() == false) { alert("Fallo el error"); } else {form.submit();  }
         
            },

             rules: {
               
  nombre:{minlength: 2,letras:true,required:true},
  apellido:{minlength: 2,letras:true,required:true},
  correo:{required:true},
  correo2:{required:true},
  usuario:{alpha:true,minlength: 2,required:true},
  pass:{required:true},
  pass2:{required:true},
  select2:{required:true},
  cedula:{minlength: 7,number:true,required:true}


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
