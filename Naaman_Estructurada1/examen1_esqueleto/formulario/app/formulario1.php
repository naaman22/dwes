<?php
  session_start();
  

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css" title="Color">
  <title>Formulario</title>
</head>

<body class="body-gris">
  <header>
    <h1>FORMULARIO DE MATRICULACION</h1>
    <h2>Datos alumno y curso</h2>
  </header>
  <main>
 
    <form action="procesar1.php" method="POST">
      <p>
         <label for="nombre">Nombre:</label>
         <input type="text" id="nombre" name="nombre" value="<?php if(isset($_SESSION["nombre"])) echo $_SESSION["nombre"]; ?>">
      </p>
      
      <p>
        <input type="radio" id="daw" name="daw" value="daw1"<?php if(isset($_SESSION["curso"]) && $_SESSION["curso"] == "daw1") echo "checked";?>>
        <label for="daw1">DAW1</label>

        <input type="radio" id="daw" name="daw" value="daw2"<?php if(isset($_SESSION["curso"]) && $_SESSION["curso"] == "daw2") echo "checked";?>>
        <label for="daw2">DAW2</label>
      </p>
      
      <p><button type="submit">SIGUIENTE</button></p>

    </form>

  </main>
  <?php 
    if(isset($_SESSION["mensajeNom"])) echo "<p class='error'>{$_SESSION['mensajeNom']}</p>"; 
    if(isset($_SESSION["mensajeC"])) echo "<p class='error'>{$_SESSION['mensajeC']}</p>"; 
  ?>
  <footer>
    <hr>
    <p>IES Floridablanca</p>
  </footer>
</body>
</html>



