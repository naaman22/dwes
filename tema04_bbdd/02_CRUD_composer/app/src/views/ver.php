<?php 
    session_start();

    require_once "../models/basedatos.php";
    require_once "../models/usuario.php";


    if(!isset($_SESSION["conectado"]) || !$_SESSION["conectado"]){
        header("location: ../../public/index.php");
        die;
    }

    $id = $_GET["id"];

    $dbInstancia = Basedatos::getInstance();
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $sentencia = $dbInstancia->get_data($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php while($registroPDO = $sentencia -> fetch(PDO::FETCH_OBJ)) :
            $usuario = new Usuario(
                $registroPDO->id,
                $registroPDO->nombre,
                $registroPDO->apellidos,
                $registroPDO->usuario,
                $registroPDO->password, 
                new DateTime($registroPDO->fecha_nac));    
            ?>
                

            <tr>
                <p><?= $usuario->nombre ?></p>
                <p><?= $usuario->apellidos ?></p>
                <p><?= $usuario->usuario ?></p>
                <p><?= $usuario->fecha_nac->format('d/m/Y')?></td>
                <p><?= $usuario->getEdad() ?></td>
            </tr>
            <br><br>
            <a href="listado.php">VOLVER</a>
        <?php endwhile; ?>
</body>
</html>