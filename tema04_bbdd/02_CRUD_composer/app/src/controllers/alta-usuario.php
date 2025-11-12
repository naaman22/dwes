<?php
    require __DIR__ . "/../../vendor/autoload.php";
    use App\models\Basedatos;
    use App\models\Usuario;

    if($_SERVER["REQUEST_METHOD"] != "POST"){
        die;
    }else{
        $nom = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $fecha_nac = $_POST["fecha_nac"];
    }

    $usuario = new Usuario(
        null,
        $nom,
        $apellidos,
        $usuario,
        $passwordHash,
        new DateTime($fecha_nac)
    );

    $dbInstance = Basedatos::getInstance();
    $dbInstance -> crear_usuario($usuario);
    
    header("location: ../views/listado.php");
?>