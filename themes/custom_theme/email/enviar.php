<?php //Obtenemos las valores enviados
	$name    = isset( $_POST['name'] ) ? $_POST['name'] : "";
	$from    = isset( $_POST['email'] ) ? $_POST['email'] : "";
	$phone   = isset( $_POST['phone'] ) ? $_POST['phone'] : "";

	$subject = isset( $_POST['subject'] ) ? $_POST['subject']  : "";
	#$address = isset( $_POST['address'] ) ? $_POST['address']  : "";
	#Mensaje
	$message = isset( $_POST['message'] ) ? $_POST['message']  : "";

	//Email A quien se le rinde cuentas
	$webmaster_email1 = "ventas@aissa.com";
	$webmaster_email2 = "Aissasecret@outlook.com";
	$webmaster_email3 = "jgomez@ingenioart.com";
	$webmaster_email4 = "jgomez.4net@gmail.com";

	include("class.phpmailer.php");
 	include("class.smtp.php");

	$mail = new PHPMailer();

	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = "ARLAC_RINO1EVER"; // SMTP password */

	$mail->From     = $from;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );
	$mail->AddAddress( $webmaster_email3 );
	$mail->AddAddress( $webmaster_email4 );

	$mail->IsHTML(true); // send as HTML

	$mail->Subject = "Formulario Web - " . $subject;

	// Activar el almacenamiento en búfer de la salida
	ob_start();
		//Incluir Plantilla de Email
		include("template.php");
	//Devolver el contenido del búfer de salida
	$template_email = ob_get_contents();	
	//Limpiar (eliminar) el búfer de salida
	ob_clean();

	//Customizar el mensaje
	$mail->Body = $template_email;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>