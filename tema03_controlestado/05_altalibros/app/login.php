<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Login</title>
</head>
<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
         <form class="formulario" action="procesar_login.php" method="post">
            <h2>Login</h2>

            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="<?php 
            if(isset($_SESSION["usuario"])){
                echo $_SESSION["usuario"];    
            }?>">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="<?php 
            if(isset($_SESSION["password"])){
                echo $_SESSION["password"];    
            }?>">
            
            <button type="submit">Acceder</button>
            
        </form>
        <br>
        <?php
            if (isset($_GET["mensaje"])){
                $mensaje = $_GET["mensaje"];
                echo ("<p class='mensaje fade-in-out'>$mensaje</p>");
            }
        ?>
        <br><br><br><br>
        


    </main>
    <?php include "footer.php"; ?>

    <?php 
        
    ?>
</body>
</html>