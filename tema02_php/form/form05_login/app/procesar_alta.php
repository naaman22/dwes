<?php
require_once("includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;
}
else{
    $file = "./bbdd/data.json";

    //Creamos variable mensaje para reasignar para cada error
    $mensaje = "";

    //Recogemos variables
    $nombre = recoge("nombre");
    $email = recoge("email");
    $pass1 = recoge("password1");
    $pass2 = recoge("password2");
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mensaje = "ERROR: Formato de email invalido";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    //Validamos que el correo no este ya creado
    foreach ($file[""] as $usu) {
        if (isset($usu["email"]) && ($usu["email"]) === $email) {
            $mensaje = "ERROR: El email ya está registrado";
            header("Location: alta.php?mensaje=$mensaje");
            die;
        }
    }

    //Validamos pass1
    if($pass1 !== $pass2){
        $mensaje = "ERROR: Las contraseñas no coinciden";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }


    //Los datos son correctos
    //Recupero la lista de usuarios
    $lista_usuarios = "bbdd/data.json";

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    //Me creo el objeto usuario
    $usuario = new Usuario($nombre,$email,$pass1);

    array_push($lista_usuarios,$usuario);

    $jsonData = json_encode($lista_usuarios, 
                            JSON_UNESCAPED_UNICODE | 
                            JSON_PRETTY_PRINT);
    $mensaje = "ALTA CORRECTA";
    header("Location: alta.php?mensaje=$mensaje");
    die;
    

}



