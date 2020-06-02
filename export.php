<?php
    include('connection.php');
  	mysqli_set_charset ($connect, "utf8");

	if (isset($_POST["export-users"])){
		$queryUsers = "Select suscripciones_ID as Número, suscripciones_correo as Correo from suscripciones order by suscripciones_ID desc";
    	$resultUsers = mysqli_query($connect, $queryUsers);
		$filename = "usuarios_suscritos.xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$isPrintHeader = false;

		if (!empty($resultUsers)){
			foreach ($resultUsers as $row){
				if(!$isPrintHeader){
					echo implode("\t", array_keys($row)) . "\n";
					$isPrintHeader = true;
				}
				echo implode("\t", array_values($row)) . "\n";
			}
		}
		exit();
	}
?>