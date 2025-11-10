<?php
session_start();

$pulsacion = $_COOKIE['pulsaciones'] ?? 0;
setcookie("pulsaciones", ++$pulsacion, time() + (7 * 24 * 60 * 60),"/");

if($_POST["accion"] == "subir" && $_SESSION["numero"] < 9){
    $_SESSION["numero"]++;
}else if($_POST["accion"] == "bajar" && $_SESSION["numero"] > 0){
    $_SESSION["numero"]--;  
}else if($_POST["accion"] == "cero"){
    $_SESSION["numero"] = 0;
    setcookie("pulsaciones", 0, time() + (7 * 24 * 60 * 60),"/");
}

header("location: index.php");
$_COOKIE["pulsaciones"] = $pulsacion;

?>