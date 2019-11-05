<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8'); 
$conexion = mysqli_connect("localhost", "root", "root", "practica1");
if($conexion->connect_errno) // comprueba un problema con la conexion
{
    $respusta = [
        'error' => true //enviar una variable de error 
    ];
}
else
{
    $conexion->set_charset("utf8"); //trabajar con utf-8 para enviar y recibir datos
    $statement = $conexion->prepare("SELECT * FROM personas");//preparar consulta sql con todos los miemos de la base de datps
    $statement->execute();

    $resultados = $statement->get_result(); //guarda consulta de base de datos en variable resultados

   $respuesta = [];

    while ($fila = $resultados->fetch_assoc()){ //traer resultados de consulta sql y los guardamos en fila
        $usuario = [ // arreglo con los elmeentos deseados
            'id' => $fila['id'],
            'nombre1' => $fila['pnombre'],
            'nombre2' => $fila['snombre'],
            'apellido1' => $fila['papellido'],
            'apellido2' => $fila['sapellido'],
            'edad' => $fila['edad'],
            'direccion' => $fila['direccion']
        ];
        array_push($respuesta,$usuario); //creamos un arreglo de cada persona y los ponemos en respeusta
    }
}

echo json_encode($respuesta);

