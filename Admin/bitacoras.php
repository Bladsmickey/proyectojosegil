
<!DOCTYPE html5>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Bitacoras del Sistema</title>

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
        
       <?php
require("../conexion.php");
mysql_query("SET NAMES 'utf8'");
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 50; 
$conteo='Select count(*) from accion';
$conteito=mysql_query($conteo);
$totalconteo1=mysql_fetch_row($conteito);
$totalconteo=$totalconteo1[0];
$paginas=ceil($totalconteo/50);

$cons="Select * from accion order by cambio LIMIT $start_from, 50";
$con=mysql_query($cons);
if($con){
mysql_query("COMMIT");
$exito=0;
}else{
mysql_query("rollback");
$exito=1;}
?>    


<?php if($exito==0){

echo '<center><h2 class="form-signin-heading"><span lang="es">Movimientos en el sistema de inscripcion</span></h2></br></br></center>';

echo '<div>
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Buscar" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>';




echo sprintf("<table class='table table-bordered table-list-search'>");
echo sprintf("<tr>");
echo "<td><center>Id. de Usuario</center></td>";
echo  "<td><center>Modificacion realizada</center></td>"; 
echo  "<td><center>Fecha</center></td>";
echo sprintf("</tr>");

echo sprintf("<tr>");
while($r=mysql_fetch_assoc($con)){
$usuario=$r['id_usuario'];
$acc=$r['cambio'];
$que=$r['donde'];
$fecha2=explode("-",$r['fecha']);
if($fecha2[1]==01){$mes="Enero";}
if($fecha2[1]==02){$mes="Febrero";}
if($fecha2[1]==03){$mes="Marzo";}
if($fecha2[1]==04){$mes="Abril";}
if($fecha2[1]==05){$mes="Mayo";}
if($fecha2[1]==06){$mes="Junio";}
if($fecha2[1]==07){$mes="Julio";}
if($fecha2[1]==08){$mes="Agosto";}
if($fecha2[1]==09){$mes="Septiembre";}
if($fecha2[1]==10){$mes="Octubre";}
if($fecha2[1]==11){$mes="Noviembre";}
if($fecha2[1]==12){$mes="Diciembre";}
echo "<td><center>$usuario</center></td>";
echo  "<td><center>$acc $que</center></td>"; 
echo  "<td><center>$fecha2[2] de $mes del $fecha2[0]</center></td>";
echo sprintf("</tr>");}
echo sprintf("</table>");
echo '<center>';
echo '<ul class="pagination">'; 
for ($i=0; $i<$paginas ; $i++) { 

  echo sprintf('<li><a href="bitacoras.php?page=%s">%s</a></li>',$i+1,$i+1);

}

    echo'</ul>';
    echo '</center>';
}else{
echo '<center>Problema al conectar con la Base de datos. Intenta mas tarde.</center></br></br>';}
?>
                          </div>

    
<?php require('../footer.html') ?>
</div>  
  
  <script>
  
  $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Buscando: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No encontrado.</td></tr>');
        }
    });
});

</script>

 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
