<?php
session_start();
    if(isset($_SESSION["email"])){
        header("location: home.php");
    }else{?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="./estilos.css">
        </head>
        <body>
            <header>
                <?php include "menu.php"?>
            </header>

            <form class="formulario" action="procesar_login.php" method="POST">
            <h2>Login</h2>

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required value="<?php if(isset($_POST["email"])){
                echo $_POST["email"];
            }else{
                echo "";
            }?>">

            <label for="password1">Contraseña</label>
            <input type="password" id="pass" name="pass" required>

            <button type="submit">Login</button>
        </form>
        <br>

        <?php
            if(isset($_GET["mensaje"])){
                $mensaje = $_GET["mensaje"];
                echo ("<p class='mensaje fade-in-out'>$mensaje</p>");
            }
        ?>
        </body>
        </html>

<?php } ?>
