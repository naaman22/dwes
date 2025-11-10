<?php
session_start();
require_once 'includes/funciones.php';

if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Location: index.php");
    die;
}else{
    $nombre = recoge("nombre");
    $edad = recoge("edad");

    $ok = true;
    if($nombre == null){
        $ok = false;

        $_SESSION["error"]["nombre"] = "Falta el nombre";
        echo "<p>{$_SESSION["error"]["nombre"]}</p>";
    }else{
        $_SESSION["nombre"] = $nombre;
        if($edad == null){
            $ok = false;

            $_SESSION["error"]["edad"] = "Falta la edad";
            echo "<p>{$_SESSION["error"]["edad"]}</p>";
        }else{
            $_SESSION["edad"] = $edad;
            echo "<p>$nombre</p>";
        }
    }

    if($ok){
        header("Location: mostrarDatos.php");
        die;
    }else{
        header("Location: index.php");
        die;
    }

}
?>