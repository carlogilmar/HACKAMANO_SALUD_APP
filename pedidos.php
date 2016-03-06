<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MediCloud</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">MediCloud</a>
				<nav>
					<ul>
					
						<li><a href="generic.html" class="active">Pedidos confirmados</a></li>
						
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">				
			<h2>Pedidos Confirmados</h2>
		<section>
			<div>
				<section>
						<?php
include('root_db.php');

//haciendo la conexión a DB

$con = mysql_connect($sql_lh,$sql_usr,$sql_pw) or die("¡No se ha podido establecer la conexión con el servidor!");
$resp = mysql_select_db($sql_name) or die("¡No se ha podido seleccionar la base de datos!");

// Consultar la base de datos
$consulta_mysql='select * from Paciente';

$resultado_consulta_mysql=mysql_query($consulta_mysql,$con);

while($registro=mysql_fetch_array($resultado_consulta_mysql)){

 if ($registro['confirmacionorden'] == 1){
 
   echo("Paciente: ");
   echo($registro['nombre']."<br>");
   echo("Dirección: ");
   echo($registro['direccion']."<br>");
   echo("Teléfono:");
   echo($registro['telefono']."<br>");
   echo("Medicamento:");
   echo($registro['medicamento']."<br>");
   echo("Complemento:");
   echo($registro['complementos']."<br>");
   echo("Correo:");
   echo($registro['correo']."<br><br>");
   echo ("
   <form method=\"post\" action=\"actualizar.php\">
   <div class=\"12u$\">
	<ul class=\"actions\">											
		<input name=\"valor\" id=\"valor\" class=\"oculto\" type=\"text\" value=\"".$registro['id_paciente']." \" />
	  <li><input type=\"submit\" value=\"Despachado\" class=\"special\"  /></li>																							
	</ul>
	</form>
	");										
 }  if ($registro['confirmacionorden'] == 0){
	$time = time();
	$fecha = date("Ymd", $time);
	
	if($registro['fecha'] == $fecha){	
		echo("<a target=\"_blank\" href=\"enviarMail.php?paciente=".$registro['id_paciente'].">");
	}
	 
 }

}

 ?>		
				</section>
				
			</div>
		</section>
			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
