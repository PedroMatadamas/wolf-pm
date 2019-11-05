	<?php
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json; charset=utf-8');
		$usuario= json_decode(file_get_contents("php://input"),true);
		//Decodificaremos los datos JSON utilizando la función json_decode() y 
		//la función file_get_contents() la utilizaremos para recibir la información en un formato más legible
		
		$pnombre = $usuario['pnombre'];
		$snombre = $usuario['snombre'];
		$papellido= $usuario['papellido'];
		$sapellido = $usuario['sapellido'];
		$edad = $usuario['edad'];
		$direccion = $usuario['direccion'];
		
		if ($pnombre != '' and $papellido != '' and $edad !=''and $direccion != '')
		{
			$respuesta = ['Todo bien'];

			$conexion =mysqli_connect("localhost", "root", "root", "practica1");
			$conexion->set_charset('utf8');
			$statement = $conexion->prepare("INSERT INTO personas (pnombre, snombre, papellido, sapellido, edad, direccion) VALUES (?,?,?,?,?,?)");
			$statement->bind_param("ssssis", $pnombre,$snombre,$papellido,$sapellido,$edad,$direccion);
			$statement->execute();

		}
		else
		{
			$respusta = [
				'error' => true //enviar una variable de error 
			];

		}

	//	echo json_encode($respuesta);