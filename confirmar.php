<?php

include('root_db.php');

//recibiendo data
$id_paciente=$_GET['pedido'];

//haciendo la conexión a DB

$con = mysql_connect($sql_lh,$sql_usr,$sql_pw) or die("¡No se ha podido establecer la conexión con el servidor!");
$resp = mysql_select_db($sql_name) or die("¡No se ha podido seleccionar la base de datos!");

 
	 
mysql_query("UPDATE paciente SET confirmacionorden=1 WHERE id_paciente=$id_paciente",$con)
or die("Problemas en el select".mysql_error());

//cerrando la base de datos
mysql_close($con);


echo "El registro fue de alta.";


?>
