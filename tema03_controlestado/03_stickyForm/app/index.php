<?php
  session_start();
  require_once 'includes/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>03_stickyform</title>
</head>
<body class="body-tipo2">
  <header>
    <h1>3 Sticky form</h1>
  </header>

  <main>
 
<!--      
      action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   -->
   
    <form action="procesar.php" method="post">
      <p>Nombre: <input type="text" name="nombre" ></p>
      <p>Edad: <input type="text" name="edad" ></p>
      </p>
      <p><input type="submit" name="submit" value="Enviar"></p>
    </form>

    <?php
      if(isset($_SESSION["error"]["nombre"])){
        print "<p class='error'>{$_SESSION["error"]["nombre"]}</p>";
      }else{
        if(isset($_SESSION["error"]["edad"])){
          print "<p class='error'>{$_SESSION["error"]["edad"]}</p>";
        }
      }
    ?>

  </main>

  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>
</html>