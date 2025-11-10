<?php 
session_start();
    include "./funciones/utilidades.php";

    $email = recoger("email");
    $pass = recoger("pass");
    $veriEmail = false;
    $veriPass = false;


    $lista_usuarios = [];
    $file = "bbdd/usuarios.json";
    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);


    foreach ($lista_usuarios as $usu) {
        if($usu->email == $email){
            
            if(password_verify($pass, $usu->password)){
                $_SESSION["email"] = $email;
                $mensaje = "Iniciando sesion...";
                header("location: home.php");
                die;
            }
        }
    }
    $mensaje = "ERROR: Las credenciales no coiniciden";
    header("location: index.php?mensaje=$mensaje");
    die;
    
?>