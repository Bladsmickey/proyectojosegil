
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Registro de Profesores</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
        <div class="container">
  <?php require('../header.php'); ?>
    <div class="col-xs-8 well nopadding">

<center><h3 class="form-signin-heading"><span lang="es">Completa los campos a continuacion</span></h3></center>

      <form class="form-horizontal" id="form2" name="form2" method="get" action="envia_prof.php">

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">Nombres</label>
</div>

<div class="col-md-3 col-sm-3">
<div class="form-group">
<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required="required" autofocus>
</div>
</div>    

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">Apellidos</label>
</div>     

<div class="col-md-3 col-sm-3">
 <div class="form-group">
 <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required="required">
</div></div>

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">C.I.N.V</label>
</div>     

<div class="col-md-3 col-sm-3">
<div class="form-group">
<select class="form-control">
<option value="V-">V-</option>
<option value="E-">E-</option>
</select>
</div></div>
 
<div class="col-md-6 col-sm-6">
 <div class="form-group">
 <input type="text" pattern="\d*" name="cedula" placeholder="Cedula de identidad" id="cedula" class="form-control" maxlength="8" required="required">
</div></div>

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">Nombre de usuario</label>
</div>   

<div class="col-md-9 col-sm-9">
 <div class="form-group">
 <input type="text" name="usuarioo" id="usuarioo" class="form-control" placeholder="Usuario" required="required">
</div></div>

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">Direccion</label>
</div>  
<div class="col-md-9 col-sm-9">
        <div class="form-group">
<input type="text" name="direcc" class="form-control" id="direcc" placeholder="Dirección" required="required">
</div></div>

<div class="col-md-3 col-sm-3">
<label class="cotrol-label">Telefono</label>
</div>    

<div class="col-md-9 col-sm-9">
<div class="form-group">
<input type="text" name="telef" maxlength="11" id="telef" title="Ejemplo: 04165247896" class="form-control" placeholder="Teléfono (Solo Números)" required="required">
</div></div>
    <br>

        <button class="btn btn-primary text-center" type="submit">Completar Registro</button>
      </form>

    </div> <!-- /container -->
    
    
<?php require('../footer.html') ?>

</div>

<script src="../jquery-1.7.1.min.js" type="text/javascript"></script>
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
  usuarioo:{alpha:true,minlength: 2,required:true},
  direcc:{alpha:true,required:true},
  telef:{minlength: 11,required:true},
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