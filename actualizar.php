<?php

include('root_db.php');

//recibiendo data
$id_paciente=$_POST['valor'];

//haciendo la conexión a DB

$con = mysql_connect($sql_lh,$sql_usr,$sql_pw) or die("¡No se ha podido establecer la conexión con el servidor!");
$resp = mysql_select_db($sql_name) or die("¡No se ha podido seleccionar la base de datos!");

$time = time();
$nDia = date("d", $time);
$nMes = date("m", $time);
$nAnio = date("Y", $time);

// Consultar la base de datos
$consulta_mysql="select * from paciente where id_paciente=$id_paciente";

$resultado_consulta_mysql=mysql_query($consulta_mysql,$con);

while($registro=mysql_fetch_array($resultado_consulta_mysql)){
	$nombre = $registro['nombre'];
	echo("nombre: $nombre");
	$ultimaEntrega = $registro['fecha'];
	$diaEntrega = substr($ultimaEntrega,8);
   $nuevoDia = $registro['periododias'] + $diaEntrega - 2;
   
 }
 
 if($nuevoDia>30){
	 $nuevoDia=1;
	 $Mes = substr($ultimaEntrega,5,2) + 1;	 
	 $Anio = substr($ultimaEntrega,0,4);
	 }else{
	$Mes = 	 substr($ultimaEntrega,5,2);
	$Anio = substr($ultimaEntrega,0,4);
	}
	 
	$nuevaFecha = $Anio.$Mes.$nuevoDia;
	$nuevaNuevaFecha = (string) $nuevaFecha;
	echo("periodo: $ultimaEntrega");
	echo("<br>dia hoy: $nDia");
	echo("<br>nuevo dia:$nuevoDia");
	echo("Fecha proxima: $nuevaNuevaFecha;");


mysql_query("UPDATE paciente SET confirmacionorden=0, fecha=$nuevaNuevaFecha WHERE id_paciente=$id_paciente",$con)
or die("Problemas en el select".mysql_error());

//cerrando la base de datos
mysql_close($con);


echo "El registro fue de alta.";
header('Location: pedidos.php');

?>
