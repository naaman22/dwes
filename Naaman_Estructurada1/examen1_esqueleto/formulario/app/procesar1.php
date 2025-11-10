<?php
    session_start();
    include("./includes/funciones.php");

    $validacion = true;
    $nom = $_POST["nombre"];
    $class = $_POST["daw"];
    $_SESSION["mensajeNom"] = "";
    $_SESSION["mensajeC"] = "";


    if($nom == ""){
        $validacion = false;
        $_SESSION["mensajeNom"] = "Debes poner tu nombre";
    }else{
        $_SESSION["nombre"] = $nom;
    }

    if($class == ""){
        $validacion = false;
        $_SESSION["mensajeC"] = "Debes marcar 1 curso";
    }else{
        $_SESSION["curso"] = $class;
    }

    if($validacion){
        header("location: formulario2.php");
    }else{
        header("location: formulario1.php");
    }


?>