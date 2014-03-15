
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Agregar actividades</title>

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
       
 <div class="col-xs-6">

<?php
require("../conexion.php");
$cons="Select * from `habilidad` where habil='Si'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<legend><h4>Actividades habilitadas</h4></legend>';
while($row=mysql_fetch_array($conss)){
echo '<form class="form-signin" id="form2" name="form2" method="post" action="elimina_habil.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='habil[]' id='habil[]' type='checkbox' value='".$row["cod_hab"]."'></td><td>".$row["tipo_hab"]."</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Eliminar Actividades" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No existen actividades habilitadas </h4>';
mysql_query("rollback");}
?>        
</div>

        <div class="col-xs-6">
          <legend><h4>Agregar actividad:</h4></legend>
<form class="form-group" id="form2" name="form2" method="get" action="envia_habil.php">
          
             <div class="form-group">
             <label for="actividad" class="col-lg-2 control-label">Actividad</label><input name="actividad" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|" title="Solo debes introducir letras" type="text" class="form-control" placeholder="Ej: canto" required="required"/>
             <label for="desc" class="col-lg-12 control-label">Introduzca una breve descripcion</label><textarea name="desc" class="form-control" /> </textarea/></br>
             </div>   
<center><input name="Button1" type="submit" value="Agregar Actividad" class="btn  btn-danger" />    </center>
                 </div>
      </div>          
          </form>
        
     </div>   
<?php require('../footer.html') ?>
 </div>   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
