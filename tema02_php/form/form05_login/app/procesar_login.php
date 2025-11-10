<?php

require_once("includes/funciones.php");
require_once("modelo/usuario.php");

if($server["REQUEST_METHOD"] != "POST"){
    header("Location: index.php");
    die;
}else{
    $mensaje = "";
   
    $email = recoge("email");
    $password = recoge("password");


    if($email == null || $password == null){
        $mensaje = "ERROR: los campos no pueden estar vacios";
        header("Location: login.php?mensaje=$mensaje");
        die;
    }

    //Comprobamos credenciales
    $usuario = checkuser($email, $password);

    if($usuario == null){
        $mensaje = ("ERROR: ")
    }

   




   
}
?>

