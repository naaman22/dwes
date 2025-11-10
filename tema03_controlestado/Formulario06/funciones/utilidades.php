<?php
    function recoger($v){
        if (!isset($_REQUEST[$v])) return null;

        $tmp = trim($_REQUEST[$v]);
        if ($tmp === '') return null;

        // Quita etiquetas y espacios
        $tmp = strip_tags($tmp);
        return $tmp;
    }

    function existeUsuario($mail){
    //Recupero la lista de usuarios
    $lista_usuarios = [];
    $file = 'bbdd/usuarios.json';    //la carpeta bbdd debe existir

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    foreach ($lista_usuarios as $usuario) {
        if ($usuario->email == $mail) {
            return true;
        }
    }
    return false;
}
?>