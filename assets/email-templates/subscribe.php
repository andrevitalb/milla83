<?php
	$hostname = "localhost";
    $username = "millacom_vital";
    $password = "3J_=OV(c&DA2vw2]%,";
    $databaseName = "millacom_sitecontrol";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    mysqli_set_charset ($connect, "utf8");
    date_default_timezone_set('America/Mexico_City');

	$email = $_POST['subscribeEmail'];

	$querySubscriber = "Select suscripciones_ID from suscripciones where suscripciones_correo = '$email'";
	// $resultSubscriber = mysqli_query($connect, $querySubscriber);
	// $rSubscriber = mysqli_fetch_array($resultSubscriber);

	$rSubscriber[0] = false;

	if(!$rSubscriber[0]){
		$queryMax = "Select MAX(suscripciones_ID) from suscripciones";
		$resultMax = mysqli_query($connect, $queryMax);
		$maxID = mysqli_fetch_array($resultMax);
		$maxID = $maxID[0] + 1;

		$querySubscribe = "Insert into suscripciones values ($maxID, '$email')";
		// $resultSubscribe = mysqli_query($connect, $querySubscribe);
		$resultSubscribe = true;

		if($resultSubscribe) {
			$subject = "Bienvenido a la familia Milla 83";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <noreply@milla83.com>'."\r\n";

			$message = "
			<html>
			<head>
			<title>$subject</title>
			</head>
			<body>
			<table width='50%' border='0' align='center' cellpadding='0' cellspacing='0' style='border-radius:15px; border: 1.5px solid #CF222C !important;'>
			<tr>
			<td colspan='2' align='center' valign='top'><img style='width: 100px; margin-top: 15px;' src='https://www.andrevital.com/proyectos/milla83/assets/img/logo_black.svg'></td>
			</tr>
			<tr style='line-height:3px'>
			<td width='50%' align='right'>&nbsp;</td>
			<td align='left'>&nbsp;</td>
			</tr>
			<tr>
			<td colspan='2' align='center' valign='top' style='border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf;font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; padding:20px 15px;'>
				<span style = 'font-size:30px;'>Texto</span><br><br>
				Vigencia:<strong>Texto</strong> al <strong>Texto</strong><br><br>
				<span style = 'font-size:28px'>Texto</span><br><br>
				<span style='font-size:13px'>Texto</span><br><br>
			</td>
			</tr>
			</table>
			</body>
			</html>
			";

			if(mail($email, $subject, $message, $headers)) echo "¡Te has suscrito exitosamente!";
			else echo "Algo salió mal, por favor vuelve a intentarlo.";
		}
		else echo "Algo salió mal, por favor vuelve a intentarlo.";
	}
	else echo "Ya estás suscrito a nuestra lista de correos.";
?>