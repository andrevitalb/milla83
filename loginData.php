<?php 
    include('connection.php');

    $errorMsg = "";
    $usuario = 0;

	function userEx(){
		global $connect, $usuario;
		$user = $_POST['loginUser'];
		$password = $_POST['loginPassword'];
		$userEx = "Select usuarios_ID from usuarios where usuarios_user = '$user'";
		$resultEx = mysqli_query($connect, $userEx);
		$rEx = mysqli_fetch_array($resultEx);

        if($rEx){
        	$pwdEx = "Select usuarios_password from usuarios where usuarios_ID = $rEx[0]";
        	$pwdResult = mysqli_query($connect, $pwdEx);
        	$pwdFnl = mysqli_fetch_array($pwdResult);

        	if($pwdFnl[0] == $password) {
        		userID($user);
				return $usuario;
			}
        	else {
        		errorMsg(1);
        		return -1;
        	}
        }
        else {
        	errorMsg(0);
        	return -1;
        }
	}

	function userID($user){
		global $connect, $usuario;
		$userID = "Select usuarios_ID from usuarios where usuarios_user = '$user'";
		$usrInd = mysqli_query($connect, $userID);
		$userInd = mysqli_fetch_array($usrInd);
		$usuario = $userInd[0];
	}

	function errorMsg($ind){
		global $errorMsg;

		switch($ind){
			case 0: $errorMsg = '<div class="alert alert-danger alert-dismissible" role="alert" style="width:100%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="zmdi zmdi-close"></i></button><strong><i class="zmdi zmdi-close-circle"></i> ¡Error!</strong> El usuario ingresado no está registrado.</div>'; break;
			case 1: $errorMsg = '<div class="alert alert-danger alert-dismissible" role="alert" style="width:100%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="zmdi zmdi-close"></i></button><strong><i class="zmdi zmdi-close-circle"></i> ¡Error!</strong> La contraseña ingresada es incorrecta o no coincide con el usuario.</div>'; break; 
		}
	}
?>