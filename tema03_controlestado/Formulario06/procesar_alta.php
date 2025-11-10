<?php
    include "./funciones/utilidades.php";
    include "./funciones/usuario.php";

    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header("location: index.php");
        die;
    }else{

        $nombre = recoger("nombre");
        $email = recoger("email");
        $pass1 = recoger("password1");
        $pass2 = recoger("password2");




        //Email
        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $mensaje = "ERROR: Email invalido";
        //     header("Location: registro.php?mensaje=$mensaje"); 
        //     die;
        // }

        //Password
        if($pass1 != $pass2){
            $mensaje = "ERROR: Las contraseñas no coinciden";
            header("Location: registro.php?mensaje=$mensaje");
                die;
        }else{
            if(strlen($pass1) < 8){
                $mensaje = "ERROR: La contraseña debe tener minimo 8 caracteres";
                header("Location: registro.php?mensaje=$mensaje");
                die;
            }
        }

        //Si todo esta correcto lo almacenamos en la bbdd
        $lista_usuarios = [];
        $file = "bbdd/usuarios.json";

        $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
        $lista_usuarios = json_decode($jsonData);

        //Me creo el objeto usuario
        $usuario = new Usuario($nombre,$email,$pass1);

        array_push($lista_usuarios, $usuario);
        $jsonData = json_encode($lista_usuarios, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        file_put_contents($file,$jsonData);
        $mensaje = "ALTA CORRECTA";
        header("Location: index.php?mensaje=$mensaje");
        die;
    }
?>