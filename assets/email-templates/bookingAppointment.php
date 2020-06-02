<?php
	$hostname = "localhost";
    $username = "millacom_vital";
    $password = "3J_=OV(c&DA2vw2]%,";
    $databaseName = "millacom_sitecontrol";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    mysqli_set_charset ($connect, "utf8");
    date_default_timezone_set('America/Mexico_City');

    $ok = true;
    $messages = array();

	$service = isset($_POST['bookService']) ? $_POST['bookService'] : '';
	$user = isset($_POST['bookName']) ? $_POST['bookName'] : '';
	$car = isset($_POST['bookCar']) ? $_POST['bookCar'] : '';
	$date = isset($_POST['bookingDate']) ? $_POST['bookingDate'] : '';
	$time = isset($_POST['bookingTime']) ? $_POST['bookingTime'] : '';

	if(!isset($service) || empty($service)){
		$ok = false;
		$messages[] = "¡Selecciona un servicio!";
	}
	if(!isset($user) || empty($user)){
		$ok = false;
		$messages[] = "¡Ingresa tu nombre!";
	}
	if(!isset($car) || empty($car)){
		$ok = false;
		$messages[] = "¡Ingresa los datos de tu vehículo!";
	}
	if(!isset($date) || empty($date)){
		$ok = false;
		$messages[] = "¡Selecciona una fecha para tu cita!";
	}
	if(!isset($time) || empty($time)){
		$ok = false;
		$messages[] = "¡Selecciona un horario para tu cita!";
	}

	if($ok){
		$queryMax = "Select MAX(citas_ID) from citas";
		$resultMax = mysqli_query($connect, $queryMax);
		$maxID = mysqli_fetch_array($resultMax);
		if($maxID[0] == "") $maxID = 1;
		else $maxID = $maxID[0] + 1;

		$queryBook = "Insert into citas values ($maxID, '$service', '$date', '$time', '$user', '$car')";
		$resultBook = mysqli_query($connect, $queryBook);

		if($resultBook) $messages[] = "¡Cita agendada exitosamente!";
		else $messages[] = "Ocurrió un problema, por favor vuelve a intentarlo.";
	}

	echo json_encode(
		array(
			'ok' => $ok,
			'messages' => $messages
		)
	);
?>