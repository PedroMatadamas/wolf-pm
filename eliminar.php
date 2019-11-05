<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8');
$usuario= json_decode(file_get_contents("php://input"),true);

$v1 = $usuario['id'];

   // $v1 = $_POST['variable1'];

        $conexion = mysqli_connect("localhost", "root", "root", "practica1");
 
        
        mysqli_query($conexion, "DELETE FROM personas WHERE id = " . $v1);
        mysqli_close($conexion);

   