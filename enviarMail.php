<?php
		
$paciente = $_GET["paciente"];					

	// Consultar la base de datos
$consulta_mysql="select * from paciente where id_paciente=$paciente";


	$link = 'medicloud.huelum.com/confirmar?pedido='.$paciente;
	$mail = 'recordatorio@medicloud.mx';
	$para      = 'isaacgaray@jenser.mx';
	$titulo    = 'hola';
	$mensaje   = 'Recordatorio de pedido de medicamento. Confiirmar: '.$link;

	   	$cabeceras = 'From: '. $mail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


	
		if(mail($para,$titulo,$mensaje,$cabeceras)){
			print"<script type=\"text/javascript\">
				alert(\"Mensaje enviado. En breve nos comunicaremos con usted\");
			</script>";
		}
		else{
			print"<script type=\"text/javascript\">
				alert(\"ERROR - Intente nuevamente.\");
			</script>";
		}
	
	
?>
