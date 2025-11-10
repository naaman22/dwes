<?php

require_once "funciones.php";

$conexion = conectaDb();

$nombre = "Naaman";
$apellidos = "Lopez";
$edad = 22;

try {
    $consulta_preparada1 = "INSERT INTO personas(nombre,apellidos,edad) VALUES(:nombre,:apellidos,:edad)";
    $sentencia = $conexion->prepare($consulta_preparada1);
    $sentencia -> bindParam(":nombre",$nombre);
    $sentencia -> bindParam(":apellidos",$apellidos);
    $sentencia -> bindParam(":edad",$edad);
    $sentencia -> execute();


} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}


print "<h2>Hemos añadido un nuevo miembro</h2>";
print "<h3>REGISTRO CON NOMBRE: {$nombre}, con APELLIDOS: {$apellidos} , con EDAD: {$edad}</h3>";


?>