<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8');
$usuario= json_decode(file_get_contents("php://input"),true);

$pnombre = $usuario['pnombre'];
$snombre = $usuario['snombre'];
$papellido= $usuario['papellido'];
$sapellido = $usuario['sapellido'];
$edad = $usuario['edad'];
$direccion = $usuario['direccion'];
$id = $usuario["id"];
   

$conexion = mysqli_connect("localhost", "root", "root", "practica1");

if($conexion->connect_errno) // comprueba un problema con la conexion
{
    $respusta = [
        'error' => true
    ];
}
else
{
    $conexion->set_charset("utf8"); //trabajar con utf-8 para enviar y recibir datos
    $statement = $conexion->prepare("UPDATE personas SET pnombre='$pnombre',snombre='$snombre',papellido='$papellido',sapellido='$sapellido',edad='$edad',direccion='$direccion' WHERE id='$id'");//preparar consulta sql
    $statement->execute();
    $resultados = $statement->get_result();


   $respuesta = ['si hay'];

}

echo json_encode($respuesta);

