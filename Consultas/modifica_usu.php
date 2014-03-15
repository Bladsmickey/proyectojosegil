
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Actualizacion de datos</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

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

<?php 
$cedula=$_GET['cedula'];
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
$con1="Select * from usuario where cedula_usu = '$cedula'";
$con2=mysql_query($con1);
$con3=mysql_fetch_assoc($con2);
$nombre=$con3['nom_usu'];
$apellido=$con3['ape_usu'];
$cedula=$con3['cedula_usu'];
$c1=$con3['correo'];
$c2=$con3['correo_al'];
if($con3['correo_al']=='Null')
{
$c2='';}
else{
$c2=$con3['correo_al'];
}
?>
      <!-- Fixed navbar -->


    <div class="container">
     <?php require('../header.php'); ?> 

     <div class="col-md-8 well nopadding">

      <form class="form-inline" id="form2" name="form2" method="get" action="actualiza_usu.php">
        <h2 class="form-signin-heading"><span lang="es">Modifica el campo que necesites</span></h2>
<div class="form-group">
<?php echo sprintf("<input type='hidden' id='cedula' name='cedula' value='%s'>",$cedula); ?>
<?php echo sprintf('<input type="text"  name="nombre" class="form-control" placeholder="Nombres" required="required" autofocus value="%s"/>', $nombre); ?></div>
<div class="form-group">
<?php echo sprintf('<input type="text"  name="apellido" class="form-control" placeholder="Apellidos" required="required" value="%s"/>', $apellido); ?></div>
<div class="form-group">
<?php echo sprintf('<input type="email" name="correo" title="Introduzca una direccion valida" class="form-control" placeholder="Correo electronico"required="required" value="%s"/>', $c1); ?></div><br>
Tiene correo alternativo?
<label class="radio-inline" id="vacuna">Si<input name="vacu" type="radio" id="vacun" value="si" checked>	</label><label class="radio-inline" id="vacuna">No<input type="radio" name="vacu" id="vacn" value="no"></label>
<div class="form-group">
<?php echo sprintf('<input type="email" name="correo2" id="correo2" class="form-control" placeholder="Correo alternativo" title="Introduzca una direccion valida" required="required" value="%s"/>', $c2); ?></div>
    <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar</button>
      </form>


    </div> <?php require('../footer.html') ?>
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
  correo:{required:true},
  correo2:{required:true}


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
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
