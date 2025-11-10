<?php 
    session_start();

    require_once "../models/basedatos.php";
    require_once "../models/usuario.php";
    include "./menu.php";

    if(!isset($_SESSION["conectado"]) || !$_SESSION["conectado"]){
        header("location: ../../public/index.php");
        die;
    }


    $dbInstancia = Basedatos::getInstance();
    $sql = "SELECT * FROM usuarios";
    $sentencia = $dbInstancia->get_data($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
</head>
<body>
    <h1>lListado de usuarios</h1>


    <table border="1px">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>USUARIO</th>
                <th>FECHA_NAC</th>
                <th>EDAD</th>
            </tr>
        </thead>
        <tbody>
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
                    <td><?= $usuario->nombre ?></td>
                    <td><?= $usuario->apellidos ?></td>
                    <td><?= $usuario->usuario ?></td>
                    <td><?= $usuario->fecha_nac->format('d/m/Y')?></td>
                    <td><?= $usuario->getEdad() ?></td>

                    <td>
                        <a href="ver.php?id=<?= $usuario->id?>"><button>VER</button></a>
                        <br>
                        <a href="actualizar.php?id=<?= $usuario->id?>"><button>ACTUALIZAR</button></a>
                        <form action="../controllers/borrar-usuario.php" method="POST">
                            <input type="hidden" name="id_a_borrar" value="<?= $usuario->id ?>">
                            <button type="submit">BORRAR</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>