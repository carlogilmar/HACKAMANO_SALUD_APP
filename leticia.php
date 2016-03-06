<?php

include('root_db.php');

//recibiendo data
$uno=$_POST['nombre'];
$dos=$_POST['direccion'];
$tres=$_POST['telefono'];
$cuatro=$_POST['medicamento'];
$cinco=$_POST['periodo'];
$seis=$_POST['complementos'];
$siete="1000";
$ocho="1";
$nueve=$_POST['fecha'];
$diez=$_POST['correo'];

//haciendo la conexión a DB

$con = mysql_connect($sql_lh,$sql_usr,$sql_pw) or die("¡No se ha podido establecer la conexión con el servidor!");
$resp = mysql_select_db($sql_name) or die("¡No se ha podido seleccionar la base de datos!");

//haciendo la inclusión de la alta a la db
mysql_query("insert into Paciente (nombre,direccion,telefono,medicamento,periododias,complementos,precio,confirmacionorden,correo,fecha)
values('$uno','$dos','$tres','$cuatro','$cinco','$seis','$siete','$ocho','$diez','$nueve')",$con)
or die("Problemas en el select".mysql_error());

//cerrando la base de datos
mysql_close($con);


print"<script type=\"text/javascript\">
				alert(\"Registro exitoso\");
			</script>";
header('Location: index.html');

?>
