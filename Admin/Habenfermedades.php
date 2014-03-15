<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Agregar Enfermedades</title>

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
mysql_query("SET NAMES 'utf8'");
$cons="Select cod_enf,tipo_enf from `enfermedad` where habil='Si'";
$conss=mysql_query($cons);
$d=mysql_num_rows($conss);
if($conss){
if($d!=0){
mysql_query("COMMIT");
echo '<h4>Enfermedades habilitadas </h4>';
while($row=mysql_fetch_array($conss)){
echo '<form class="form-signin" id="form2" name="form2" method="post" action="elimina_enfer.php">';
echo '<label class="checkbox-inline">';
echo "<td><input name='enfer[]' id='enfer[]' type='checkbox' value='".$row["cod_enf"]."'></td><td>".$row["tipo_enf"]."</td>";
echo '</label>';
echo '<br>    <br>';}
echo '<input name="Button1" type="submit" value="Eliminar enfermedad" class="btn  btn-danger" />';
echo '</form>';
}}if($d==0){
echo '<h4>No existen enfermedades habilitadas </h4>';
mysql_query("rollback");}
?>    

</br>
                          </div>
        <div class="col-lg-6">
          <h4>Agregar enfermedad:</h4>
<form class="form-signin" id="form2" name="form2" method="get" action="envia_enfer.php" class="form-horizontal">
          
             <div class="form-group">
<label for="enfer" class="col-lg-2 control-label">Enfermedad</label>
<input name="enfer" pattern="[|^[a-zA-Z ñÑáéíóúüç]*$|]" type="text" title="Solo debes introducir letras" class="form-control" placeholder="Ej: diabetes" required="required"/>
             <label for="descripcion" class="col-lg-12 control-label">Introduzca una breve descripcion</label><textarea name="descripcion" class="form-control"/> </textarea/>

             </div>       
<center><input name="Button1" type="submit" value="Agregar enfermedad" class="btn  btn-danger" />    </center>
          </form>
                 </div>
                 
      </div>        
    <?php require('../footer.html') ?>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
