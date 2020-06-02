<?php 
	$name = $_POST['contactName'];
	$subject = $_POST['contactSubject'];
	$phone = $_POST['contactPhone'];
	$email = $_POST['contactEmail'];
	$message = $_POST['contactMessage'];

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: noreply@milla83.com'."\r\n";

	$message = "
	<html>
	<head>
	<title>$subject</title>
	</head>
	<body>
	<table width='50%' border='0' align='center' cellpadding='0' cellspacing='0'>
	<tr>
	<td colspan='2' align='center' valign='top'><img style='width: 175px; margin-top: 15px; ' src='https://www.milla83.com/assets/img/logo_white-rounded.svg'></td>
	</tr>
	<tr>
	<td width='50%' align='right'>&nbsp;</td>
	<td align='left'>&nbsp;</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'><strong>Nombre:</strong></td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$name."</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'><strong>Teléfono:</strong></td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$phone."</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'><strong>Email:</strong></td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$email."</td>
	</tr>
	<tr>
	<td align='right' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'><strong>Mensaje:</strong></td>
	<td align='left' valign='top' style='border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;'>".$message."</td>
	</tr>
	<tr>
	<td colspan='2' align='center' valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;'><strong>Enviado el:</strong> ".date('d-m-Y H:i:s')."</td>
	</tr>
	<tr>
	<td width='50%' align='right'>&nbsp;</td>
	<td align='left'>&nbsp;</td>
	</tr>
	<tr>
	<td width='50%' align='right'>&nbsp;</td>
	<td align='left'>&nbsp;</td>
	</tr>
	</table>
	</body>
	</html>
	";

	if(mail("contacto@milla83.com", $subject, $message, $headers)) echo '<head><title>Gracias por contactarnos</title></head><body><link href="https://fonts.googleapis.com/css?family=Open+Sans|Permanent+Marker&display=swap" rel="stylesheet"><div><div><img src="https://milla83.com/assets/img/logo_white.svg" alt="Logo Milla 83"></div><h1>Mensaje Enviado</h1><h4>Gracias por ponerte en contacto con nosotros.<br> Estaremos respondiéndote tan pronto como nos sea posible.</h4></div><style>*{color:#fff;}body{margin: 0;padding: 0;background-color: #000;background-size: cover;height: 100vh;width: 100vw;}body>div {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: block;text-align: center;width: 85%;}img{width: 20rem;display: inline-block;margin: 0 0 1rem;}h1{font-family: Permanent Marker, sans-serif;font-size: 50px;font-weight: 700;text-transform: uppercase;display: inline-block;margin: 0 0 1.5rem;}h4{font-size: 32px;font-family: Open Sans, sans-serif;font-weight: 400;margin: 0;}</style></body><meta http-equiv="refresh" content="2.5;URL=index"/>';
	else echo '<head><title>Ocurrió un problema</title></head><body><link href="https://fonts.googleapis.com/css?family=Open+Sans|Permanent+Marker&display=swap" rel="stylesheet"><div><div><img src="https://milla83.com/assets/img/logo_white.svg" alt="Logo Milla 83"></div><h1>Ocurrió un problema</h1><h4>Intenta nuevamente dentro de unos minutos.</h4></div><style>*{color:#fff;}body{margin: 0;padding: 0;background-color: #000;background-size: cover;height: 100vh;width: 100vw;}body>div {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: block;text-align: center;width: 85%;}img{width: 20rem;display: inline-block;margin: 0 0 1rem;}h1{font-family: Permanent Marker, sans-serif;font-size: 50px;font-weight: 700;text-transform: uppercase;display: inline-block;margin: 0 0 1.5rem;}h4{font-size: 32px;font-family: Open Sans, sans-serif;font-weight: 400;margin: 0;}</style></body><meta http-equiv="refresh" content="2.5;URL=index"/>';
?>