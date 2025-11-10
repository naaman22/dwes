<?php

require_once "funciones.php";

$conexion = conectaDb();

$nombre = "Naaman";
$apellidos = "Lopez";
$edad = 22;

try {
    $consulta_preparada1 = "DELETE FROM personas WHERE personas.nombre LIKE :nombre AND
    personas.apellidos LIKE :apellidos AND
    personas.edad = :edad;";
    $sentencia = $conexion->prepare($consulta_preparada1);
    $sentencia -> bindParam(":nombre",$nombre);
    $sentencia -> bindParam(":apellidos",$apellidos);
    $sentencia -> bindParam(":edad",$edad);
    $sentencia -> execute();


} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}


print "<h2>Hemos eliminado a {$nombre} con apellido {$apellidos}</h2>";


?>