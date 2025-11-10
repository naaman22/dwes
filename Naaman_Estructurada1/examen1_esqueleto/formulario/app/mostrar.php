<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css" title="Color">
  <title>Sticky</title>
</head>

<body class="body-gris">
  <header>
    <h1>FORMULARIO DE MATRICULACION</h1>
    <h2>Eleccion de materias de XXXXXX</h2>
  </header>
  <main>
    <?php
        echo "<p>Nombre: {$_SESSION['nombre']}</p>";
        echo "<p>Curso: {$_SESSION['curso']}</p>";
        echo "<p>Lista de materias: </p>";
        foreach ($listaCursos as $curso) {
            echo "<p>-$curso</p>";
        }
    ?>
    <br>
    <a href="index.php">Volver al formulario</a>
  </main>
  <footer>
    <hr>
    <p>IES Floridablanca</p>
  </footer>
</body>

</html>