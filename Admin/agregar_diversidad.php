
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Agregar diversidades</title>

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
     
       
 <div class="col-lg-6">

<?php
require("../conexion.php");
$cons="Select cod_div,nom_div,tipo_div from `diversidad_fun` where habil='Si'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Diversidades funcionales habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<form class="form-signin" id="form2" name="form2" method="post" action="elimina_diver.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='fun[]' id='fun[]' type='checkbox' value='".$row["cod_div"]."'></td><td>".$row["nom_div"]."</td>. Tipo: <td>".$row["tipo_div"]."</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Eliminar Diversidad" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No existen diversidades habilitadas </h4>';
mysql_query("rollback");}
?>        
        
         
<br>    
                          </div>
<?php
@$var=$_GET['resul'];
?>
        <div class="col-lg-6">
          <h4>Agregar actividad:</h4>
<form class="form-signin" id="form2" name="form2" method="get" action="envia_diver.php">
          
             <div class="form-group">
             <label for="div" class="col-lg-2 control-label">Diversidad Funcional</label><input name="div" title="Solo debes introducir letras" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" type="text" class="form-control" placeholder="Ej: manos" required="required"/>
          <label for="tipo" class="col-lg-10 control-label">Tipo de diversidad funcional</label> <select name="tipo" class=" form-control" required="required">
				<option value=""></option>
				<option value="Fisica">F&iacute;sica</option>
				<option value="Psicologica">Psicol&oacute;gica</option>
			</select>
             <label for="desc" class="col-lg-12 control-label">Introduzca una breve descripcion</label><textarea name="desc" class="form-control" /> </textarea/></br>

             </div>   
<center><input name="Button1" type="submit" value="Agregar Diversidad" class="btn  btn-danger" />    </center>
                 </div>
      </div>          
    <?php if($var==1){echo '<center><p class="form-signin">Diversidad registrada con exito!</p></center>';}?>
    <?php if($var==2){echo '<center><p class="form-signin">No se logro insertar la Diversidad. Intenta mas tarde.</p></center>';}?>
    <?php if($var==3){echo '<center><p class="form-signin">No se logro insertar la Diversidad. Ya existe una con ese nombre.</p></center>';}?>
          </form>
        
    
<?php require('../footer.html') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
