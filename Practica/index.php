
<?php

session_start();
// session_unset(); // Elimina todas las variables de sesión
// session_destroy(); // Destruye la sesión actual


if(isset($_SESSION["user"])){
    header("location: home.php");
    die;
}else{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "./menu.php"; ?>

    <form action="./assest/procesar_login.php" method="POST" style="text-align: center; border:1px solid black; width:50%;">
        <label for="">User: </label>
        <input type="text" name="user" id="user" required value="<?=$_POST["user"] ?? "";?>">
        <br>
        <br>
        <label for="">Password: </label>
        <input type="password" name="pass" id="pass" required>
        <br>
        <button type="submit">Enviar</button>
        <br>
    </form>

    <?php
    if(isset($_SESSION["message"])){
        print "<strong>ERROR: ".$_SESSION["message"]."</strong>";
    }else{
        echo "";
    }
    ?>
</body>
</html>


<?php
}
?>