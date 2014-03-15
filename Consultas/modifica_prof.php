
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Actualizacion de datos</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<?php 
$cedula=$_GET['cedula'];
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$con1="Select * from usuario,profesores where cedula_usu = '$cedula' and cedu_prof='$cedula'";
$con2=mysql_query($con1);
$con3=mysql_fetch_assoc($con2);
$nombre=$con3['nom_usu'];
$apellido=$con3['ape_usu'];
$cedula=$con3['cedula_usu'];
$c1=$con3['direc_prof'];
$c2=$con3['tlf_prof'];
?>

  </head>

  <body>
    <div class="container">
     <?php require('../header.php'); ?> 

     <div class="col-md-8 well nopadding">




      <form class="form-group" id="form2" name="form2" method="get" action="actualiza_prof.php">
        <h4 class="form-signin-heading"><span lang="es">Modifica los campos que necesites</span></h4>
<?php echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula); ?>
<div class="form-group">
<?php echo sprintf('<input type="text" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|]" id="nombre" name="nombre" class="form-control" placeholder="Nombres" required="required" autofocus value="%s"/>', $nombre); ?></div>
<div class="form-group">
<?php echo sprintf('<input type="text" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" id="apellido" name="apellido" class="form-control" placeholder="Apellidos" required="required" value="%s"/>', $apellido); ?></div>
<div class="form-group">
<?php echo sprintf('<input type="text" name="direcc" class="form-control" id="direccion" placeholder="Dirección" required="required" value="%s"/>', $c1); ?></div>
<div class="form-group">
<?php echo sprintf('<input type="text" pattern="\d*" maxlength="12" name="telef" id="telef" class="form-control" placeholder="Teléfono (Solo Números)" maxlength="11" required="required" value="%s"/>', $c2); ?></div>
    <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar datos</button>
      </form>

    </div> <!-- /container -->
    
  <?php require('../footer.html') ?>

</div>

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
  direccion:{alpha:true,required:true},
  telef:{number:true,required:true}


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