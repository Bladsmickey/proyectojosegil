<?php
date_default_timezone_set('America/Caracas'); 
$db = mysql_pconnect("localhost", "root", "");
  if (!$db)
  {
     echo "Error: No se ha podido conectar a la base de datos.  Por favor, prueba de nuevo más tarde.";
     exit;
  }
mysql_select_db("liceo");
$nombre="Respaldo_JGF";
$fecha=date("Y-m-d H-i-s");
$db=$nombre."-".$fecha;
$sql="sql";
$db2=$db.".".$sql;
$con="INSERT INTO `respaldo`(`bd`,`fecha`) VALUES ('$db2','$fecha')";
$cons=mysql_query($con);
if($cons){

$output=system("C:\wamp\bin\mysql\mysql5.6.12\bin\mysqldump.exe -u root liceo");
header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$db.'.sql"');

$fp=fopen("'.$db.'.sql", "r");
fpassthru($fp);

}else{

}

?>