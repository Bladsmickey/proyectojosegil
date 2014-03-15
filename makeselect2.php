<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
	$idpais = $_GET['pais'];
	$link = mysql_connect("localhost", "root", "", true);

	// debes cambiar "test" por el nombre de tu base de datos en MySQL.
	mysql_select_db("paises", $link); 
	mysql_query("SET NAMES UTF8",$link);
	
	$sql = "SELECT * FROM `ciudades` WHERE `idestado`=  ".mysql_real_escape_string($idpais)." ORDER BY `ciudad`";
	
	$result = mysql_query($sql,$link);
	
	echo '<select id="ciudad2" name="ciudad2">';
	while ($fila = mysql_fetch_assoc($result)) {
		echo sprintf('<option>%s</option>',$fila['ciudad']);
	}
	echo '</select>';
	mysql_close($link);
?>
<body>
</body>
</html>