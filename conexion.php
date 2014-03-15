<?php 
$db = mysql_connect("localhost", "root", "");

  if (!$db)
  {
     echo "Error: No se ha podido conectar a la base de datos.  Por favor, prueba de nuevo más tarde.";
     exit;
  }
mysql_select_db("liceo");	

?>