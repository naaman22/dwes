<?php
    require __DIR__ . "/../../vendor/autoload.php";
    use App\models\Basedatos;
    use App\models\Usuario;

    if($_SERVER["REQUEST_METHOD"] != "POST"){
        die;
    }else{
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"] ?? "";
        if(empty($password)){
            $passwordHash = null;
        }else{
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }
        $fechaNac = $_POST["fecha_nac"];


        $usuario = new Usuario(
            null,
            $nombre,
            $apellidos,
            $usuario,
            $passwordHash,
            new DateTime($fechaNac)
        );

        $dbInstance = Basedatos::getInstance();
        $dbInstance -> actualizar_usuario($usuario);
    }


?>