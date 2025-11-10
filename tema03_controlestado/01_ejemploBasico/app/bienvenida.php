<?php
session_start();

if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
}else{
    header("location: index.php");
    die;
}

$usuario = $_SESSION["usuario"]
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <h2>Bienvenido, <?=$usuario?> 👋</h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>