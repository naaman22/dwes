<?php
    session_start();

    $listaUsus = [];
    $file = "../bbdd/usuarios.json";
    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $listaUsus = json_decode($jsonData);

    $veriLogin = false;
    $user = trim(htmlspecialchars(strip_tags($_POST["user"])));
    $pass = trim(htmlspecialchars(strip_tags($_POST["pass"])));
    $message = "";

    foreach ($listaUsus as $usu) {
        if($user == $usu->nombre){
            if(password_verify($pass, $usu->password)){
                $veriLogin = true;
                if($usu->esAdmin){
                    $_SESSION["esAdmin"] = true;
                }else{
                    $_SESSION["esAdmin"] = false;
                }
            }else{
                $message = "ERROR: Contraseña incorrecta";
            }
        }
    }

    if($veriLogin){
        $_SESSION["user"] = $user;
        header("location: ../home.php");
    }else{
        $_SESSION["message"] = $message;
        header("location: ../index.php");
    }
?>