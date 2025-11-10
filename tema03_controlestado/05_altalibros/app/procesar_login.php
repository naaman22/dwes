<?php
session_start();
$usuario_valido = "admin";
$clave_valida = "1234";


if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
}else{
    $usuario = "";
}

$clave = $_POST["password"] ?? "";


$_SESSION["usuario"] = $usuario;
$_SESSION["password"] = $clave;

if ($usuario === $usuario_valido && $clave === $clave_valida) {

    header("Location: listado.php");
    die;
}else{
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}
?>